<template>
    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"><input type="text" v-model="name" placeholder="Задание" /></th>
            <th scope="col"><input type="text" v-model="full_name" placeholder="Пользователь" /></th>
            <th scope="col"><input type="text" v-model="report_name" placeholder="Тип" /></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            <template v-for="(item, index) in list">
                <tr :key="index">
                    <th>{{item.id}}</th>
                    <td>{{item.task.name}}</td>
                    <td>{{item.user.full_name}}</td>
                    <td>{{item.task.report_name}}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-success" @click.prevent.stop="eye(item.id)">
                                <i class="fas fa-eye"></i>
                            </a>
<!--                            <a class="btn btn-success" @click="approve(item.id)">-->
<!--                                <i class="fas fa-check"></i>-->
<!--                            </a>-->
<!--                            <a class="btn btn-danger" @click="drop(item.id)">-->
<!--                                <i class="fas fa-ban"></i>-->
<!--                            </a>-->
                        </div>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</template>

<script>

    export default {
        name: "questions",
        props: {},
        $exec: ['update', 'statistic', 'approve', 'drop'],
        data () {
            return {
                data: [],
                name: "",
                full_name: "",
                report_name: "",
            };
        },
        mounted () {
            this.update();
        },
        computed: {
            list () {
                return this.data.filter((item) => {
                    return String(item.task.name).indexOf(this.name) !== -1 &&
                        String(item.task.full_name).indexOf(this.full_name) !== -1 &&
                        String(item.task.report_name).indexOf(this.report_name) !== -1;
                });
            }
        },
        unmount () {},
        methods: {
            eye (id) {
                ljs.exec({"modal:put":["App\\LteAdmin\\Modals\\TaskReportModal@index",{"report_id":id},{"backdrop":"static","focus":true,"keyboard":false,"size":'big'}]});
            },
            update () {
                jax.questions_control.list_for_approve().then(({data}) => {
                    this.$set(this, 'data', data);
                });
            },
            approve (id, modal_id) {
                let cost = $('#input_add_to_balance').val();
                if (modal_id) {
                    "modal:hide".exec(modal_id);
                }
                jax.questions_control.approve(id, cost)
                    .then(() => this.update());
            },
            drop (id, modal_id) {
                "alert::confirm".exec(`Отклонить отчет пользователя?`, () => {
                    return window.ljs.swal.fire({
                        title: "Укажите причину отказа",
                        input: 'text',
                        inputValue: 'отчет не соответствует условиям задания',
                        showCancelButton: true,
                        confirmButtonText: 'Готово'
                    }).then((state) => {
                        if (modal_id) {
                            "modal:hide".exec(modal_id);
                        }
                        jax.questions_control.drop(id, state.value)
                            .then(() => this.update());
                    });
                });
            },
            statistic (users, online, online_peck) {
                $('.total_user_count').html(` ${users} `);
                $('.total_online_count').html(` ${online} `);
                $('.total_online_peck_count').html(` ${online_peck} `);
            }
        }
    }
</script>
