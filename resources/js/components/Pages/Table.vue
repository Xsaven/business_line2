<template>
    <section class="standings">
        <div class="cont row">
            <div class="block_head">
                <div class="title">Турнирная таблица направления {{direction.name}}</div>
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
                                    <td class="number">{{ui+1+(page > 1 ? (page-1)*10 : 0)}}</td>
                                    <td class="name"><a :href="`/user/${user.id}`">{{user.full_name}}</a></td>
                                    <td class="scores">{{user[sort]}}</td>
                                    <td class="tasks">{{user.reports_count}}</td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <div class="bottom" v-if="meta.last_page > 1">
                    <div class="pagination">
                        <a href="javascript:void(0)" @click="prevPage" :class="{prev: true, disabled: page === 1}"></a>
                        <template v-for="(page_range, page_index) in pageRange">
                            <div v-if="page_range==='...'" :key="`sep_${page_index}`" class="sep">...</div>
                            <a v-else href="javascript:void(0)" :key="`page_${page_index}`" @click="setPage(page_range)" :class="{'active': page === page_range}">{{page_range}}</a>
                        </template>
                        <a href="javascript:void(0)" @click="nextPage" :class="{next: true, disabled: page === meta.last_page}"></a>
                    </div>
                </div>
            </section>
        </div>
    </section>
</template>

<script>
export default {
    $exec: ["load"],
    name: "pages_table",
    props: {
        sort: {required: true},
        users: {required: true},
        direction: {required: true},
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
        this.load();
    },
    computed: {
        pageRange () {
            let current = this.meta.current_page;
            let last = this.meta.last_page;
            let delta = 2;
            let left = current - delta;
            let right = current + delta + 1;
            let range = [];
            let pages = [];
            let l;
            for (let i = 1; i <= last; i++) {
                if (i === 1 || i === last || (i >= left && i < right)) {
                    range.push(i);
                }
            }
            range.forEach(function (i) {
                if (l) {
                    if (i - l === 2) {
                        pages.push(l + 1);
                    } else if (i - l !== 1) {
                        pages.push('...');
                    }
                }
                pages.push(i);
                l = i;
            });
            return pages;
        },
        pages () {
            let pages = [];
            if (this.page-2 >= 1 && this.page === this.meta.last_page) { pages.push(this.page-2); }
            if (this.page-1 >= 1) { pages.push(this.page-1); }
            pages.push(this.page);
            if (this.page+1 <= this.meta.last_page) { pages.push(this.page+1); }
            if (this.page+2 <= this.meta.last_page && this.page === 1) { pages.push(this.page+2); }
            return pages;
        }
    },
    watch: {
        page () {
            this.load();
        },
    },
    methods: {
        href(get) {
            return location.pathname + "?sort=" + get
        },
        load () {
            this.loading = true;
            jax.params({page: this.page})
                .table
                .pagination(this.direction.id, this.sort)
                .then(({data, meta}) => {
                    this.data = data;
                    this.meta.to = meta.to;
                    this.meta.from = meta.from;
                    this.meta.total = meta.total;
                    this.meta.per_page = meta.per_page;
                    this.meta.last_page = meta.last_page;
                    this.meta.current_page = meta.current_page;
                    this.loading = false;
                }).catch(() => {
                    this.loading = false;
                });
        },
        setPage (page) {
            if (!this.loading) {
                this.page = page;
            }
        },
        nextPage () {
            if (!this.loading && this.page < this.meta.last_page) {
                this.page++;
            }
        },
        prevPage () {
            if (!this.loading && this.page > 1) {
                this.page--;
            }
        },
        lastPage () {
            if (!this.loading && this.page !== this.meta.last_page) {
                this.page = this.meta.last_page;
            }
        },
        firstPage () {
            if (!this.loading && this.page !== 1) {
                this.page = 1;
            }
        },
    }
}
</script>
