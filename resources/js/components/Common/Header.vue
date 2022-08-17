<template>
    <span>
        <header>
            <div class="cont row">
                <a class="logo mob_mini" href="/home">
                    <img src="/images/logo.svg" alt="">
                </a>

                <div class="title">
                    <img src="/images/header-title.svg" alt="">
                  </div>

                <div class="links" v-if="directions && user">
                    <div><a :href="`/${directions[0].slug}`" :class="{active: ljs.cfg('name') === 'home'}">Главная</a></div>
                    <div><a href="/table" :class="{active: ljs.cfg('name') === 'table'}">Рейтинг</a></div>
                    <div><a href="/rules" :class="{active: ljs.cfg('name') === 'rules'}">Правила</a></div>
                    <div><a href="/faq" :class="{active: ljs.cfg('name') === 'faq'}">FAQ</a></div>
                </div>

<!--                <div class="icons" v-if="user">-->
<!--                    <v-search-modal />-->
<!--                </div>-->

                <div class="scores">{{user.balance}} б</div>

                <div class="account" v-if="user">
                    <a :href="`/profile`" class="user">
                        <div class="avatar" v-html="user.avatar"></div>
                        <div class="name">{{user.full_name}}</div>
                    </a>
                </div>

                <button class="mob_menu_btn" v-if="user">
                    <v-icon icon="ic_menu" />
                    <v-icon icon="ic_delete" />
                </button>
            </div>
        </header>
        <section id="mob_menu">
<!--            <div class="twenty_years">-->
<!--                <img src="/images/twenty_years_mini.svg" alt="">-->
<!--            </div>-->

            <div class="account" v-if="user">
                <a :href="`/profile`" class="user">
                    <div class="avatar" v-html="user.avatar"></div>
                    <div class="name">{{user.full_name}}</div>
                </a>

                <div class="scores">{{user.balance}} б</div>
            </div>

            <div class="links" v-if="directions && user">
                <div><a :href="`/${directions[0].slug}`">Главная</a></div>
                <div><a href="/table">Рейтинг</a></div>
                <div><a href="/rules">Правила</a></div>
                <div><a href="/faq">FAQ</a></div>
            </div>
        </section>
    </span>
</template>

<script>
    export default {
        $sync: ["user", "directions"],
        name: "v-header",
        props: {},
        data () {
            return {
                user: {},
                directions: {}
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {}
    }
</script>
