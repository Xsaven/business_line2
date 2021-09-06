<template>
    <v-layout>
        <section class="support">
            <div class="cont">
                <div class="block_head center">
                    <div class="title">Техническая поддержка</div>
                </div>

                <div class="data">
                    <div class="title">Возникли вопросы? Мы поможем!</div>

                    <div class="time">
                        <div>
                            <div class="val">10.09 – 17.09</div>
                            <div class="desc">круглосуточно</div>
                        </div>

                        <div>
                            <div class="val">18.09–10.10</div>
                            <div class="desc">
                                <div>пн–пт: 09.00–19.00 (мск)</div>
                                <div>сб, вс: 11.00–17.00 (мск)</div>
                            </div>
                        </div>
                    </div>

                    <div class="line"></div>

                    <div class="title">Техническая поддержка сайта</div>

                    <div class="messengers">
                        <div><a :href="settings.support_telegram_link">
                            <div class="icon">
                                <img data-src="images/ic_telegram.svg" alt="" class="lozad">
                            </div>
                            <span>{{ settings.support_telegram_phone }}</span>
                        </a></div>

                        <div><a :href="settings.support_whatsapp_link">
                            <div class="icon">
                                <img data-src="images/ic_whatsapp.svg" alt="" class="lozad">
                            </div>
                            <span>{{ settings.support_whatsapp_phone }}</span>
                        </a></div>
                    </div>

                    <img data-src="images/bg_support_data.svg" alt="" class="bg lozad">
                </div>

                <div class="text">Если вы не получили ответ от технической поддержки сайта в течение 12 часов,  обратитесь в ГК «Деловые Линии»: {{ settings.support_email }}</div>
            </div>
        </section>
    </v-layout>
</template>

<script>
    export default {
        name: "pages_support",
        props: {
            settings: {required:true},
        },
        data () {
            return {

            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {}
    }
</script>
