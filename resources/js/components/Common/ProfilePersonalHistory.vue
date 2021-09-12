<template>
    <section class="lk_data">
        <div class="history">
            <div class="block_head">
                <div class="title">История</div>
            </div>

            <div v-if="balance.length" class="list">
                <template v-for="b in balance">
                    <div class="item">
                        <div :class="item_classes(b)"><span>{{b.day}}</span> {{month[b.month]}}</div>

                        <div class="name" v-if="b.task">
                            <a :href="`/task/${b.task.id}`">{{b.task.name}}</a>
                        </div>
                        <div class="name" v-else>
                            {{b.message}}
                        </div>

                        <div class="scores">{{b.cost}} баллов</div>

                        <button class="flag_btn">
                            <v-icon icon="ic_flag" />
                        </button>
                    </div>
                </template>

<!--                <div class="bottom" v-if="meta.last_page > 1">-->
<!--                    <div class="pagination">-->
<!--                        <a href="javascript:void(0)" @click="prevPage" :class="{prev: true, disabled: page === 1}"></a>-->
<!--                        <a-->
<!--                            v-for="(p,i) in pages"-->
<!--                            href="javascript:void(0)" :key="`page_${i}`" @click="setPage(p)"-->
<!--                            :class="{'active': page === p}">{{p}}</a>-->

<!--                        <a href="javascript:void(0)" @click="nextPage" :class="{next: true, disabled: page === meta.last_page}"></a>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
            <div v-else class="empty">Здесь еще ничего нет :(</div>
        </div>
    </section>
</template>

<script>
    export default {
        $sync: ['user'],
        name: "v-profile-personal-history",
        props: {
            balance: {}
        },
        data () {
            return {
                user: {},
                data: [],
                meta: {
                    to: 0,
                    from: 0,
                    total: 0,
                    per_page: 0,
                    last_page: 0,
                    current_page: 0,
                },
                page: 1,
                month: {
                    '01': 'января',
                    '02': 'февраля',
                    '03': 'марта',
                    '04': 'апреля',
                    '05': 'мая',
                    '06': 'июня',
                    '07': 'июля',
                    '08': 'августа',
                    '09': 'сентября',
                    '10': 'октября',
                    '11': 'ноября',
                    '12': 'декабря',
                },
            };
        },
        mounted () {
            //this.load();
        },
        computed: {},
        watch: {},
        methods: {
            item_classes (item) {
                return {
                    date: true,
                    color1: item.task && item.task.event_type === 'one-day',
                    color2: item.task && item.task.event_type === 'instant',
                    color3: item.task && item.task.event_type === 'multi-day',
                    color4: !item.task || !item.task.started,
                }
            },
        }
    }
</script>
