<template>
    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Сообщение</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            <template v-for="(item, index) in data">
                <tr :key="index">
                    <th scope="row">{{item.id}}</th>
                    <td>{{item.user.full_name}}</td>
                    <td>{{item.text}}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
<!--                            <a class="btn btn-warning">-->
<!--                                <i class="fas fa-eye"></i>-->
<!--                            </a>-->
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
        name: "commentaries",
        props: {},
        $exec: ['update'],
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
                jax.commentaries_control.list_for_approve().then(({data}) => {
                    this.$set(this, 'data', data);
                });
            },
            approve (id) {
                jax.commentaries_control.approve(id)
                    .then(() => this.update());
            },
            drop (id) {
                jax.commentaries_control.drop(id)
                    .then(() => this.update());
            },
            anchor (id) {
                jax.commentaries_control.anchor(id)
                    .then(() => this.update());
            },
        }
    }
</script>
