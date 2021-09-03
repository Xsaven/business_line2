<template>
    <section class="lk_info">
        <div class="cont row">
            <section class="lk_aside">
                <div class="links">
                    <div><a href="javascript:;" :class="{active: select===1}" @click="select=1">Личная информация</a></div>
                    <div><a href="javascript:;" :class="{active: select===2}" @click="select=2">История начисления рейтинга</a></div>
                    <div><a href="javascript:;" :class="{active: select===3}" @click="select=3">Мои заказы</a></div>
                </div>

                <div class="user_informer">
                    <div class="item">
                        <div>Баллы: {{user.balance}}</div>
                    </div>

                    <div class="item">
                        <div>Лайки:{{user.likes}}</div>
                    </div>

                    <img data-src="/images/bg_user_informer.svg" alt="" class="lozad bg">
                    <img data-src="/images/bg_user_informer2.svg" alt="" class="lozad bg2">
                </div>
            </section>
            <v-profile-personal-information v-if="select===1" />
            <v-profile-personal-history v-else-if="select===2" />
            <v-profile-personal-orders v-else-if="select===3" />
        </div>
    </section>
</template>

<script>
    export default {
        $sync: ["user"],
        name: "pages_profile",
        props: {},
        data () {
            return {
                user: {},
                select: 1
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {}
    }
</script>
