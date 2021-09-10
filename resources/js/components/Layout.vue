<template>
    <div>
        <v-loading :active="isLoading" :is-full-screen="true" />

        <template v-if="!isLoading">
            <slot></slot>
        </template>
    </div>
</template>

<script>
    export default {
        $sync: ['user'],
        $exec: ['logout'],
        name: "v-layout",
        namespace: "app.events.ws",
        props: {},
        data () {
            return {
                isLoading: false,
                user: {}
            };
        },
        mounted () {
            setTimeout(() => {
                this.echo_mount();
                this.ping();
            }, 200);
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
                }, 3000*60);
            },
            echo_mount () {
                if (!this.ws_channel_global) {
                    this.ws_channel_global =
                        this.channel_global.listen('all_user_exec', 'execCallback');
                }
                if (!this.ws_channel_personal) {
                    this.ws_channel_personal =
                        this.channel_personal.listen('exec', 'execCallback');
                        //this.channel_personal.listen('exec_no_self', 'execCallback');
                }
                if (!this.ws_channel_notification) {
                    this.ws_channel_notification =
                        this.channel_personal.notification(this.toast);
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
            toast (notify) {

                let status = 'status' in notify ? notify.status : 'info';
                let text = 'text' in notify ? notify.text : '';
                let title = 'title' in notify ? notify.title : '';

                "update::new_notifications".exec();

                return `toast:${status}`.exec(text, title);
            },
            logout () {
                let time = Number(localStorage.getItem('logined'));
                if (!time || (Date.now()-time) > 4000) {
                    "doc::redirect".exec("/logout");
                } else {
                    localStorage.removeItem('logined')
                }
            }
        }
    }
</script>
