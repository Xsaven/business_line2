<template>
    <div class="mini_modal" id="notifications_modal" v-show="user.new_notifications_count">
        <div class="head">
            <div class="title">Новые уведомления</div>

            <button type="button" class="read_btn" @click="mark_all_as_read">Отметить как прочитанное</button>
        </div>

        <div v-for="(i,k) in new_notifications" class="item">
            <div class="avatar" v-html="i.avatar"></div>
            <div>{{i.message}}<a v-if="i.link" :href="i.link"> {{i.link_title ? i.link_title : i.link}}</a><span v-else-if="i.link_title"> {{i.link_title}}</span>.
                <span class="time">{{i.created_at}}</span></div>
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
            }
        }
    }
</script>
