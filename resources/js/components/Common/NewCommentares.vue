<template>
    <div class="notifications modal_cont">
        <button @click.stop.prevent="open" ref="b" :class="{'btn mini_modal_btn': true, new: !!Number(user.new_notifications_count)}">
            <v-icon icon="ic_notifications" />
        </button>
        <div class="mini_modal" ref="modal">
            <div class="head">
                <div class="title">Новые уведомления</div>

                <button type="button" class="read_btn" @click="mark_all_as_read">Отметить как прочитанное</button>
            </div>
            <div class="scroll">
                <div v-for="(i,k) in new_notifications" class="item">
                    <div class="avatar" v-html="i.avatar"></div>
                    <div><span v-html="i.message"></span><a v-if="i.link" :href="i.link"> {{i.link_title ? i.link_title : i.link}}</a><span v-else-if="i.link_title"> {{i.link_title}}</span>
                        <span class="time">{{i.created_at}}</span></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        $sync: ["user", "new_notifications"],
        name: "v-new-commentaries",
        props: {},
        data () {
            return {
                user: {
                    new_notifications_count: 0
                },
                new_notifications: []
            };
        },
        mounted () {},
        computed: {},
        watch: {
            'user.new_notifications_count' (val) {
                if (!!Number(val)) {
                    jax.user.new_notifications().then(({data}) => {
                        this.new_notifications = data;
                        ljs.onetime(() => {
                            const observer = lozad('.lozad', {
                                rootMargin: '200px 0px',
                                threshold: 0,
                                loaded: (el) => el.classList.add('loaded')
                            });
                            observer.observe();
                        },200);
                    });
                }
            }
        },
        methods: {
            mark_all_as_read () {
                this.user.new_notifications_count = 0;
                jax.user.mark_as_read_notifications().then(() => {
                    jax.user.new_notifications().then(({data}) => {
                        this.new_notifications = data;
                    });
                })
            },
            open () {
                const modal = $(this.$refs.modal);
                const button = $(this.$refs.b);

                if (button.hasClass('active')) {
                    button.removeClass('active')
                    $('.mini_modal').removeClass('active')
                    if (is_touch_device()) $('body').css('cursor', 'default')
                } else {
                    $('.mini_modal_btn').removeClass('active')
                    button.addClass('active')

                    $('.mini_modal').removeClass('active')
                    modal.addClass('active')

                    setTimeout(() => {
                        modal.find('input').focus()
                    }, 100)

                    if (is_touch_device()) $('body').css('cursor', 'pointer')
                }
            }
        }
    }
</script>
