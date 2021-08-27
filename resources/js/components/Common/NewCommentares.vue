<template>
    <div class="mini_modal" id="notifications_modal">
        <div class="head">
            <div class="title">Новые уведомления</div>

            <button class="read_btn">Отметить как прочитанное</button>
        </div>

        <div class="item">
            <div class="avatar">
                <!--<span>QQ</span>-->
                <img data-src="/images/tmp/user_avatar.jpg" alt="" class="lozad">
                <!--<img :data-src="user.photo" alt="" class="lozad" />-->
            </div>

            <div>Алена Васильева опубликовала <a href="/">новый отчет</a>. <span class="time">1 ч</span></div>
        </div>

        <div class="item">
            <div class="avatar">
                <img data-src="/images/tmp/user_avatar.jpg" alt="" class="lozad">
            </div>

            <div>Алена Васильева опубликовала <a href="/">новый отчет</a>. <span class="time">1 ч</span></div>
        </div>
    </div>
</template>

<script>
    export default {
        $sync: ["user"],
        name: "v-new-commentaries",
        props: {},
        data () {
            return {
                user: {
                    new_notifications_count: 0
                }
            };
        },
        mounted () {},
        computed: {},
        watch: {
            'user.new_notifications_count' (val) {
                if (!!Number(val)) {

                }
            }
        },
        methods: {}
    }
</script>
