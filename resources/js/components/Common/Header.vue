<template>
    <span>
        <header>
            <div class="cont row">
                <a class="logo mob_mini" href="/home">
                    <img src="/images/logo.svg" alt="">
                </a>

                <div class="twenty_years">
                    <img src="/images/twenty_years_mini.svg" alt="">
                </div>

                <div class="links" v-if="directions && user">
                    <div><a :href="`/direction/${directions[0].slug}`">{{directions[0].name}}</a></div>
                    <div><a :href="`/direction/${directions[1].slug}`">{{directions[1].name}}</a></div>
                    <div><a :href="`/direction/${directions[2].slug}`">{{directions[2].name}}</a></div>
                    <div class="margin"><a href="/rules">Правила</a></div>
                </div>

                <div class="icons" v-if="user">
                    <v-search-modal />

                    <div class="cart"><a href="/products">
                        <v-icon icon="ic_cart" />
                    </a></div>
                </div>

                <div class="col_right" v-if="user">
                    <div class="scores">{{user.balance}} б</div>

                    <v-new-commentaries />

                    <div class="account">
                        <a :href="`/profile`" class="user">
                            <div class="avatar" v-html="user.avatar"></div>
                            <div class="name">{{user.full_name}}</div>
                        </a>
                    </div>
                </div>

                <button class="mob_menu_btn" v-if="user">
                    <v-icon icon="ic_menu" />
                    <v-icon icon="ic_delete" />
                </button>
            </div>
        </header>
        <section id="mob_menu">
            <div class="twenty_years">
                <img src="/images/twenty_years_mini.svg" alt="">
            </div>

            <div class="account" v-if="user">
                <a :href="`/profile`" class="user">
                    <div class="avatar" v-html="user.avatar"></div>
                    <div class="name">{{user.full_name}}</div>
                </a>

                <div class="scores">{{user.balance}} б</div>
            </div>

            <div class="links" v-if="directions && user">
                <div><a :href="`/direction/${directions[0].slug}`">{{directions[0].name}}</a></div>
                <div><a :href="`/direction/${directions[1].slug}`">{{directions[1].name}}</a></div>
                <div><a :href="`/direction/${directions[2].slug}`">{{directions[2].name}}</a></div>
                <div><a href="/rules">Правила</a></div>
                <div><a href="/products">Магазин</a></div>
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
