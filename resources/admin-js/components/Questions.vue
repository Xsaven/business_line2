<template>
    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Задание</th>
            <th scope="col">Пользователь</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            <template v-for="(item, index) in data">
                <tr :key="index">
                    <th scope="row">{{item.task.id}}</th>
                    <td>{{item.task.name}}</td>
                    <td>{{item.user.name}}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a class="btn btn-success" @click="approve(item.id)">
                                <i class="fas fa-check"></i>
                            </a>
                            <a class="btn btn-danger" @click="drop(item.id)">
                                <i class="fas fa-trash"></i>
                            </a>
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
        $exec: ['update', 'statistic'],
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
            update () {
                jax.questions_control.list_for_approve().then(({data}) => {
                    this.$set(this, 'data', data);
                });
            },
            approve (id) {
                jax.questions_control.approve(id)
                    .then(() => this.update());
            },
            drop (id) {
                jax.questions_control.drop(id)
                    .then(() => this.update());
            },
            statistic (users, online, online_peck) {
                $('.total_user_count').html(` ${users} `);
                $('.total_online_count').html(` ${online} `);
                $('.total_online_peck_count').html(` ${online_peck} `);
            }
        }
    }
</script>
