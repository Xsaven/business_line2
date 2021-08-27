<template>
    <span>
        <header>
            <div class="cont row">
                <div class="logo mob_mini" data-href="/home">
                    <img src="/images/logo.svg" alt="">
                </div>

                <div class="twenty_years">
                    <img src="/images/twenty_years_mini.svg" alt="">
                </div>

                <div class="links">
                    <div><a href="/">Fun</a></div>
                    <div><a href="/">Sport</a></div>
                    <div><a href="/">Болельщики</a></div>
                    <div class="margin"><a href="/rules">Правила</a></div>
                </div>

                <div class="icons">
                    <div class="search modal_cont">
                        <button class="btn mini_modal_btn" data-modal-id="#search_modal">
                            <v-icon icon="ic_search" />
                        </button>

                        <div class="mini_modal" id="search_modal">
                            <form action="" class="form">
                                <input type="text" name="" value="" class="input" placeholder="Поиск по сайту">

                                <button type="submit" class="submit_btn">
                                    <v-icon icon="ic_search" />
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="cart"><a href="/">
                        <v-icon icon="ic_cart" />
                    </a></div>
                </div>

                <div class="col_right">
                    <div class="scores">{{user.balance}} б</div>

                    <div class="notifications modal_cont">
                        <button :class="{'btn mini_modal_btn': true, new: !!Number(user.new_notifications_count)}" data-modal-id="#notifications_modal">
                            <v-icon icon="ic_notifications" />
                        </button>
                        <v-new-commentaries />
                    </div>

                    <div class="account">
                        <a href="javascript:;" class="user">
                            <div class="avatar" v-html="user.avatar"></div>
                            <div class="name">{{user.full_name}}</div>
                        </a>
                    </div>
                </div>

                <button class="mob_menu_btn">
                    <v-icon icon="ic_menu" />
                    <v-icon icon="ic_delete" />
                </button>
            </div>
        </header>
        <section id="mob_menu">
            <div class="twenty_years">
                <img src="/images/twenty_years_mini.svg" alt="">
            </div>

            <div class="account">
                <a href="/" class="user">
                    <div class="avatar" v-html="user.avatar"></div>
                    <div class="name">{{user.full_name}}</div>
                </a>

                <div class="scores">{{user.balance}} б</div>
            </div>

            <div class="links">
                <div><a href="/">Fun</a></div>
                <div><a href="/">Sport</a></div>
                <div><a href="/">Болельщики</a></div>
                <div><a href="/rules">Правила</a></div>
                <div><a href="/">Магазин</a></div>
            </div>
        </section>
    </span>
</template>

<script>
    export default {
        $sync: ["user"],
        name: "v-header",
        props: {},
        data () {
            return {
                user: {}
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {}
    }
</script>
