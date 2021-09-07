<template>
    <div class="schedule">
        <div class="title">Расписание активностей</div>

        <div class="head">
            <div class="exp">
                <div><div class="color color1"></div>Мгновенные</div>
                <div><div class="color color2"></div>Быстрые</div>
                <div><div class="color color3"></div>Многодневные</div>
            </div>
            <div class="challenge_btn" style="cursor: pointer" @click="challange">
                <div class="title">Челлендж на месяц</div>
                <div class="duration">13.09 – 8.10</div>
                <div class="name">Стульчик-челлендж</div>
            </div>
        </div>

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

                    <v-direction-callendar-item :item="tasks[34]" date="09.13" />

                    <v-direction-callendar-item :item="tasks[35]" date="09.14" />

                    <v-direction-callendar-item :item="tasks[37]" date="09.15" />

                    <v-direction-callendar-item :item="tasks[38]" date="09.16" />

                    <v-direction-callendar-item :item="tasks[40]" date="09.17" />

                    <v-direction-callendar-item :weekend="true" date="09.18" />

                    <v-direction-callendar-item :weekend="true" date="09.19" />

                    <!--LINE-->

                    <v-direction-callendar-item date="09.13" />

                    <v-direction-callendar-item :item="tasks[36]" :width="3" date="09.14-09.16" />

                    <v-direction-callendar-item date="09.17" />

                    <v-direction-callendar-item :weekend="true" date="09.18" />

                    <v-direction-callendar-item :weekend="true" date="09.19" />

                    <!--LINE-->

                    <v-direction-callendar-item date="09.13" />

                    <v-direction-callendar-item date="09.14" />

                    <v-direction-callendar-item date="09.15" />

                    <v-direction-callendar-item :item="tasks[39]" :right="true" date="09.16" />

                    <v-direction-callendar-item date="09.17" />

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

                    <v-direction-callendar-item :item="tasks[42]" date="09.20" />

                    <v-direction-callendar-item :item="tasks[44]" date="09.21" />

                    <v-direction-callendar-item :item="tasks[45]" date="09.22" />

                    <v-direction-callendar-item :item="tasks[47]" date="09.23" />

                    <v-direction-callendar-item :item="tasks[49]" date="09.24" />

                    <v-direction-callendar-item :weekend="true" date="09.25" />

                    <v-direction-callendar-item :weekend="true" date="09.26" />

                    <!--LINE-->

                    <v-direction-callendar-item :item="tasks[43]" date="09.20" />

                    <v-direction-callendar-item date="09.21" />

                    <v-direction-callendar-item :item="tasks[46]" :width="3" date="09.22-09.24" />

                    <v-direction-callendar-item :weekend="true" date="09.25" />

                    <v-direction-callendar-item :weekend="true" date="09.26" />

                    <!--LINE-->

                    <v-direction-callendar-item date="09.20" />

                    <v-direction-callendar-item date="09.21" />

                    <v-direction-callendar-item date="09.22" />

                    <v-direction-callendar-item date="09.23" />

                    <v-direction-callendar-item :item="tasks[48]" :right="true" date="09.24-09.28" />

                    <v-direction-callendar-item :weekend="true" date="09.25" />

                    <v-direction-callendar-item :weekend="true" date="09.26" />
                </div>
            </div>
        </div>

        <div class="week_wrap">
            <div class="week">
                <div class="days">
                    <div class="day">
                        <div class="number">27</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">28</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">29</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">30</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">01</div>
                        <div class="month">Октября</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">02</div>
                        <div class="month">Октября</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">03</div>
                        <div class="month">Октября</div>
                    </div>
                </div>

                <div class="events">

                    <v-direction-callendar-item :item="tasks[48]" :width="2" :left="true" date="09.24-09.28" />

                    <v-direction-callendar-item :item="tasks[54]" date="09.29" />

                    <v-direction-callendar-item :item="tasks[56]" date="09.30" />

                    <v-direction-callendar-item :item="tasks[57]" date="10.01" />

                    <v-direction-callendar-item :weekend="true" date="10.02" />

                    <v-direction-callendar-item :weekend="true" date="10.03" />

                    <!--LINE-->

                    <v-direction-callendar-item :item="tasks[51]" date="09.27" />

                    <v-direction-callendar-item :item="tasks[52]" :width="3" date="09.28-09.30" />

                    <v-direction-callendar-item date="10.01" />

                    <v-direction-callendar-item :weekend="true" date="10.02" />

                    <v-direction-callendar-item :weekend="true" date="10.03" />

                    <!--LINE-->

                    <v-direction-callendar-item date="09.27" />

                    <v-direction-callendar-item :item="tasks[53]" date="09.28" />

                    <v-direction-callendar-item date="09.29" />

                    <v-direction-callendar-item :item="tasks[55]" :width="2" :right="true" date="09.30-10.05" />

                    <v-direction-callendar-item :weekend="true" date="10.02" />

                    <v-direction-callendar-item :weekend="true" date="10.03" />
                </div>
            </div>
        </div>

        <div class="week_wrap">
            <div class="week">
                <div class="days">
                    <div class="day">
                        <div class="number">04</div>
                        <div class="month">Октября</div>
                    </div>

                    <div class="day">
                        <div class="number">05</div>
                        <div class="month">Октября</div>
                    </div>

                    <div class="day">
                        <div class="number">06</div>
                        <div class="month">Октября</div>
                    </div>

                    <div class="day">
                        <div class="number">07</div>
                        <div class="month">Октября</div>
                    </div>

                    <div class="day">
                        <div class="number">08</div>
                        <div class="month">Октября</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">09</div>
                        <div class="month">Октября</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">10</div>
                        <div class="month">Октября</div>
                    </div>
                </div>

                <div class="events">

                    <v-direction-callendar-item :item="tasks[55]" :width="2" :left="true" date="09.30-10.05" />

                    <v-direction-callendar-item :item="tasks[62]" date="10.06" />

                    <v-direction-callendar-item :item="tasks[63]" date="10.07" />

                    <v-direction-callendar-item :item="tasks[65]" date="10.08" />

                    <v-direction-callendar-item :weekend="true" date="10.09" />

                    <v-direction-callendar-item :weekend="true" date="10.10" />

                    <!--LINE-->

                    <v-direction-callendar-item :item="tasks[59]" date="10.04" />

                    <v-direction-callendar-item :item="tasks[60]" :width="3" date="10.05-10.07" />

                    <v-direction-callendar-item date="10.08" />

                    <v-direction-callendar-item :weekend="true" date="10.09" />

                    <v-direction-callendar-item :weekend="true" date="10.10" />

                    <!--LINE-->

                    <v-direction-callendar-item date="10.04" />

                    <v-direction-callendar-item :item="tasks[61]" date="10.05" />

                    <v-direction-callendar-item date="10.06" />

                    <v-direction-callendar-item :item="tasks[64]" date="10.07" />

                    <v-direction-callendar-item date="10.08" />

                    <v-direction-callendar-item :weekend="true" date="10.09" />

                    <v-direction-callendar-item :weekend="true" date="10.10" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "v-direction-sport-callendar",
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
