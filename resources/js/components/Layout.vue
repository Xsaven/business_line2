<template>
    <div class="wrap">
        <div class="main auth_wrap">
            <v-header />
            <slot></slot>
        </div>
        <v-footer />
        <div class="overlay"></div>
        <div class="bg">
            <img data-src="/images/bg_1920.jpg" alt="" class="bg_1920 lozad">
            <img data-src="/images/bg_1600.jpg" alt="" class="bg_1600 lozad">
            <img data-src="/images/bg_1440.jpg" alt="" class="bg_1440 lozad">
            <img data-src="/images/bg_1280.jpg" alt="" class="bg_1280 lozad">
            <img data-src="/images/bg_768.jpg" alt="" class="bg_768 lozad">
            <img data-src="/images/bg_480.jpg" alt="" class="bg_480 lozad">
            <img data-src="/images/bg_360.jpg" alt="" class="bg_360 lozad">
        </div>
    </div>
</template>

<script>
    export default {
        $sync: ['user'],
        name: "v-layout",
        props: {},
        data () {
            return {
                user: {}
            };
        },
        mounted () {
            this.echo_mount();
            this.ping();
        },
        computed: {
            channel_personal () { return this.echo.private(`App.Models.User.${this.user.id}`); },
            channel_global () { return this.echo.private(`user.exec`); },
            channel_live () { return this.echo.join('Live'); },
        },
        watch: {},
        methods: {
            ping () {
                setInterval(() => {
                    jax.user.ping().then(({result}) => {
                        if (!result) {
                            //"doc::reload".exec();
                        }
                    }).catch(() => {
                        //"doc::reload".exec();
                    });
                }, 1000*60);
            },
            echo_mount () {
                if (!this.ws_channel_global) {
                    this.ws_channel_global =
                        this.channel_global.listen('all_user_exec', 'execCallback');
                }
                if (!this.ws_channel_personal) {
                    this.ws_channel_personal =
                        this.channel_personal.listen('exec', 'execCallback');
                }
                // this.channel_live
                //     .listen('ws_events.message');

                // this.channel_live.listenForWhisper('update_question');
                // this.channel_live.listenForWhisper('update_comment_section');
                // this.channel_live.listenForWhisper('update_comment');
            },
            execCallback ({exec}) {
                state.ws = true;
                this.ljs.exec(exec);
                state.ws = false;
            },
        }
    }
</script>
