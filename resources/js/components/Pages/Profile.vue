<template>
    <v-layout>
        <section class="lk_info">
            <div class="cont row">
                <section class="lk_aside">
                    <div class="links">
                        <div><a href="javascript:;" :class="{active: select===1}" @click="select=1">Личная информация</a></div>
                        <div><a href="javascript:;" :class="{active: select===2}" @click="select=2">История начисления рейтинга</a></div>
                    </div>

                    <div class="user_informer">
                        <div class="item">
                            <div>Баллы: {{user.balance}}</div>
                            <div>Место в рейтинге: {{user.balance_rating}}</div>
                        </div>

<!--                        <img data-src="/images/bg_user_informer.svg" alt="" class="lozad bg">-->
<!--                        <img data-src="/images/bg_user_informer2.svg" alt="" class="lozad bg2">-->
                        <img data-src="/images/lk-dec.png" alt="" class="lozad bg2">
                    </div>
                </section>
                <v-profile-personal-information v-if="select===1" :divisions="divisions" :positions="positions" :reports="reports"/>
                <v-profile-personal-history v-else-if="select===2" :balance="balance" />
                <v-profile-personal-orders v-else-if="select===3" :orders="orders"/>
            </div>
        </section>
    </v-layout>
</template>

<script>
    export default {
        $sync: ["user"],
        name: "pages_profile",
        props: {
          divisions: {required:true},
          positions: {required:true},
            reports: {required:true},
            balance: {required:true},
          orders: {required: true}
        },
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
