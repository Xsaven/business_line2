<template>
    <div class="schedule">
        <div class="title">Расписание активностей</div>

        <div class="week_wrap">
            <div class="week">
                <div class="days">
                    <div class="day">
                        <div class="number">15</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day">
                        <div class="number">16</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day">
                        <div class="number">17</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day">
                        <div class="number">18</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day">
                        <div class="number">19</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">20</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">21</div>
                        <div class="month">Августа</div>
                    </div>
                </div>

                <div class="events">

                    <v-direction-callendar-item date="08.15" />

                    <v-direction-callendar-item date="08.16" />

                    <v-direction-callendar-item :item="tasks[1]" :width="5" date="08.17-08-21" />
                </div>
            </div>
        </div>

        <div class="week_wrap">
            <div class="week">
                <div class="days">
                    <div class="day">
                        <div class="number">22</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day">
                        <div class="number">23</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day">
                        <div class="number">24</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day">
                        <div class="number">25</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day">
                        <div class="number">26</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">27</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">28</div>
                        <div class="month">Августа</div>
                    </div>
                </div>

                <div class="events">

                    <v-direction-callendar-item :item="tasks[2]" :width="7" date="08.22-08.28" />

                </div>
            </div>
        </div>

        <div class="week_wrap">
            <div class="week">
                <div class="days">
                    <div class="day">
                        <div class="number">29</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day">
                        <div class="number">30</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day">
                        <div class="number">31</div>
                        <div class="month">Августа</div>
                    </div>

                    <div class="day">
                        <div class="number">1</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day">
                        <div class="number">2</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">3</div>
                        <div class="month">Сентября</div>
                    </div>

                    <div class="day weekend">
                        <div class="number">4</div>
                        <div class="month">Сентября</div>
                    </div>
                </div>

                <div class="events">

                    <v-direction-callendar-item :item="tasks[3]" :width="7" date="08.29-09.04" />

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
