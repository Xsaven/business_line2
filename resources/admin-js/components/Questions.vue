<template>
    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Задание</th>
            <th scope="col">Пользователь</th>
            <th scope="col">Тип</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            <template v-for="(item, index) in data">
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
                data: []
            };
        },
        mounted () {
            this.update();
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
                "alert::confirm".exec(`Пометить отчет #${id} как выполненный?`, () => {
                    if (modal_id) {
                        "modal:hide".exec(modal_id);
                    }
                    jax.questions_control.approve(id)
                        .then(() => this.update());
                })
            },
            drop (id, modal_id) {
                "alert::confirm".exec(`Пометить отчет #${id} как не выполненный?`, () => {
                    if (modal_id) {
                        "modal:hide".exec(modal_id);
                    }
                    jax.questions_control.drop(id)
                        .then(() => this.update());
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
