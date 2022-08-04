<template>
    <div class="schedule">
        <div class="title">Расписание активностей</div>

        <div class="week_wrap">
            <div class="week">
                <div class="days">
                    <div class="day">
                        <div class="number">13</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">14</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">15</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">16</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">17</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">18</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">19</div>
                        <div class="month">Сентября</div>
                    </div>
                </div>

                <div class="events">

                    <v-direction-callendar-item :item="tasks[1]" date="09.13" />

                    <v-direction-callendar-item :item="tasks[2]" date="09.14" />

                    <v-direction-callendar-item :item="tasks[4]" date="09.15" />

                    <v-direction-callendar-item :item="tasks[6]" date="09.16" />

                    <v-direction-callendar-item :item="tasks[7]" date="09.17" />

                    <v-direction-callendar-item :weekend="true" date="09.18" />

                    <v-direction-callendar-item :weekend="true" date="09.19" />

                    <!--LINE-->

                    <v-direction-callendar-item date="09.13" />

                    <v-direction-callendar-item :item="tasks[3]" :width="3" date="09.14-09.16" />

                    <v-direction-callendar-item date="09.17" />

                    <v-direction-callendar-item :weekend="true" date="09.18" />

                    <v-direction-callendar-item :weekend="true" date="09.19" />

                    <!--LINE-->

                    <v-direction-callendar-item date="09.13" />

                    <v-direction-callendar-item date="09.14" />

                    <v-direction-callendar-item date="09.15" />

                    <v-direction-callendar-item :item="tasks[5]" :width="2" :right="true" date="09.16-09.20" />

                    <v-direction-callendar-item :weekend="true" date="09.18" />

                    <v-direction-callendar-item :weekend="true" date="09.19" />

                </div>
            </div>
        </div>

        <div class="week_wrap">
            <div class="week">
                <div class="days">
                    <div class="day">
                        <div class="number">20</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">21</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">22</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">23</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">24</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">25</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">26</div>
                        <div class="month">Сентября</div>
                    </div>
                </div>

                <div class="events">

                    <v-direction-callendar-item :item="tasks[5]" :left="true" date="09.16-09.20" />

                    <v-direction-callendar-item :item="tasks[11]" date="09.21" />

                    <v-direction-callendar-item :item="tasks[12]" date="09.22" />

                    <v-direction-callendar-item :item="tasks[14]" date="09.23" />

                    <v-direction-callendar-item :item="tasks[16]" date="09.24" />

                    <v-direction-callendar-item :weekend="true" date="09.25" />

                    <v-direction-callendar-item :weekend="true" date="09.26" />

                    <!--LINE-->

                    <v-direction-callendar-item :item="tasks[10]" :width="3" date="09.20-09.22" />

                    <v-direction-callendar-item date="09.23" />

                    <v-direction-callendar-item :item="tasks[15]" :right="true" date="09.24-09.28" />

                    <v-direction-callendar-item :weekend="true" date="09.25" />

                    <v-direction-callendar-item :weekend="true" date="09.26" />

                    <!--LINE-->

                    <v-direction-callendar-item :item="tasks[9]" date="09.20" />

                    <v-direction-callendar-item date="09.21" />

                    <v-direction-callendar-item :item="tasks[13]" :width="3" date="09.22-09.24" />

                    <v-direction-callendar-item :weekend="true" date="09.25" />

                    <v-direction-callendar-item :weekend="true" date="09.26" />
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "v-direction-fun-callendar",
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
            challange () {
                $('.direction_info .schedule').hide()
                $('.direction_info .challenge').fadeIn(300)
            }
        }
    }
</script>
