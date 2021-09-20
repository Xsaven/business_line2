<template>
    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"><input type="text" v-model="name" placeholder="Задание" style="width: 100%;" /></th>
            <th scope="col"><input type="text" v-model="full_name" placeholder="Пользователь" style="width: 100%;" /></th>
            <th scope="col"><input type="text" v-model="report_name" placeholder="Тип" style="width: 100%;" /></th>
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
                    return String(item.task.name).toLocaleLowerCase().indexOf(String(this.name).toLocaleLowerCase()) !== -1 &&
                        String(item.user.full_name).toLocaleLowerCase().indexOf(String(this.full_name).toLocaleLowerCase()) !== -1 &&
                        String(item.task.report_name).toLocaleLowerCase().indexOf(String(this.report_name).toLocaleLowerCase()) !== -1;
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
                let desc = $('#input_admin_comment').val();
                if (modal_id) {
                    "modal:hide".exec(modal_id);
                }
                jax.questions_control.approve(id, cost, desc)
                    .then(() => this.update());
            },
            drop (id, modal_id) {
                "alert::confirm".exec(`Отклонить отчет пользователя?`, () => {
                    let desc = $('#input_admin_comment').val();
                    return window.ljs.swal.fire({
                        title: "Укажите причину отказа",
                        input: 'text',
                        inputValue: !!desc ? desc : 'отчет не соответствует условиям задания',
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
