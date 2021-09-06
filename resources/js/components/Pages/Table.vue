<template>
    <section class="standings">
        <div class="cont row">
            <div class="block_head">
                <div class="title">Турнирная таблица Sport направления</div>
            </div>

            <section class="aside">
                <div class="links">
                    <div><a :href="`${href('balance')}`" :class="{active: sort === 'balance'}">За
                        баллы</a></div>

                    <div><a :href="`${href('likes')}`" :class="{active: sort === 'likes'}">За
                        лайки</a></div>
                </div>
            </section>


            <section class="data">
                <div class="table_wrap">
                    <table>
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>{{sort==='balance' ? 'Баллы' : 'Лайки'}}</th>
                            <th class="aligncenter">Задания</th>
                        </tr>
                        </thead>

                        <tbody>
                            <template v-for="(user, ui) in data">
                                <tr>
                                    <td class="number">{{ui+1+(page > 1 ? page*10:0)}}</td>
                                    <td class="name"><a :href="`/user/${user.id}`">{{user.full_name}}</a></td>
                                    <td class="scores">{{user[sort]}}</td>
                                    <td class="tasks">{{user.reports_count}}</td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

<!--                <div class="bottom">-->
<!--                    <div class="pagination">-->
<!--                        <a href="/" class="prev disabled"></a>-->

<!--                        <a class="active">1</a>-->
<!--                        <a href="/">2</a>-->
<!--                        <a href="/">3</a>-->
<!--                        <a href="/">4</a>-->
<!--                        <div class="sep">...</div>-->
<!--                        <a href="/">13</a>-->

<!--                        <a href="/" class="next"></a>-->
<!--                    </div>-->

<!--                    &lt;!&ndash; <a href="/" class="catch_up_link">Как догнать лидеров?</a> &ndash;&gt;-->
<!--                </div>-->
            </section>
        </div>
    </section>
</template>

<script>
export default {
    name: "pages_table",
    props: {
        sort: {required: true},
        users: {required: true},
    },
    data() {
        return {
            data: this.users,
            meta: {
                to: 0,
                from: 0,
                total: 0,
                per_page: 0,
                last_page: 0,
                current_page: 0,
            },
            page: 1
        };
    },
    mounted() {
    },
    computed: {},
    watch: {},
    methods: {
        href(get) {
            return location.pathname + "?sort=" + get
        },
        load () {
            jax.params({page: this.page})
                .table
                .pagination()
                .then(({data, meta}) => {
                    this.data = data;
                    this.meta.to = meta.to;
                    this.meta.from = meta.from;
                    this.meta.total = meta.total;
                    this.meta.per_page = meta.per_page;
                    this.meta.last_page = meta.last_page;
                    this.meta.current_page = meta.current_page;
                });
        },
    }
}
</script>
