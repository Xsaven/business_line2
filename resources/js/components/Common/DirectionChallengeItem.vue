<template>
    <div class="challenge">
        <div class="head">
            <div class="title">Челлендж на месяц</div>

            <button class="back_btn" type="button" @click="calendar">Назад</button>
        </div>

        <div class="days">
            <div class="col">
                <div class="day">
                    <div class="number">17</div>
                    <div class="month">Сентября</div>
                </div>

                <div class="events">
                    <a :href="`/task/${tasks[0].id}`" :class="{item: true, grey: tasks[0].finished}">
                        <div class="time">00:01-23:59</div>
                        <div class="name" v-html="tasks[0].short_description"></div>

                        <button :class="{favorite_btn: true, active: tasks[0].complete_user}">
                            <v-icon icon="ic_flag"/>
                        </button>
                    </a>
                </div>
            </div>


            <div class="col">
                <div class="day">
                    <div class="number">24</div>
                    <div class="month">Сентября</div>
                </div>

                <div class="events">
                    <a :href="`/task/${tasks[1].id}`" :class="{item: true, grey: tasks[1].finished}">
                        <div class="time">00:01-23:59</div>
                        <div class="name" v-html="tasks[1].short_description"></div>

                        <button :class="{favorite_btn: true, active: tasks[1].complete_user}">
                            <v-icon icon="ic_flag"/>
                        </button>
                    </a>
                </div>
            </div>


            <div class="col">
                <div class="day">
                    <div class="number">01</div>
                    <div class="month">Октября</div>
                </div>

                <div class="events">
                    <a :href="`/task/${tasks[2].id}`" :class="{item: true, grey: tasks[2].finished}">
                        <div class="time">00:01-23:59</div>
                        <div class="name" v-html="tasks[2].short_description"></div>

                        <button :class="{favorite_btn: true, active: tasks[2].complete_user}">
                            <v-icon icon="ic_flag"/>
                        </button>
                    </a>
                </div>
            </div>


            <div class="col">
                <div class="day">
                    <div class="number">08</div>
                    <div class="month">Октября</div>
                </div>

                <div class="events">
                    <a :href="`/task/${tasks[3].id}`" :class="{item: true, grey: tasks[3].finished}">
                        <div class="time">00:01-23:59</div>
                        <div class="name" v-html="tasks[3].short_description"></div>

                        <button :class="{favorite_btn: true, active: tasks[3].complete_user}">
                            <v-icon icon="ic_flag"/>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "v-direction-challenge-item",
        props: {
            tasks: {required:true},
        },
        data () {
            return {

            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
            calendar () {
                $('.direction_info .challenge').hide()
                $('.direction_info .schedule').fadeIn(300)
            }
        }
    }
</script>
