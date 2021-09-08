<template>
    <div class="task_wrap">
        <div class="task">
            <div class="head">
                <div class="title">
                    <a :href="`/task/${task.id}`">{{task.name}}</a>
                </div>

                <div class="date">{{String(report.month).split('-')[1]}} {{month[String(report.month).split('-')[1]]}} {{String(report.time)}}</div>
            </div>

            <div class="author">
                <div class="avatar" v-html="user.avatar">
                </div>

                <div>
                    <div class="name">{{user.name}}</div>
                    <div class="text">{{report.comment}}</div>
                </div>
            </div>

            <div class="video" v-for="image in report.files">
                <img :src="image.files" alt="" class="lozad">
                <!--                <svg class="icon"><use xlink:href="/images/sprite.svg#ic_video_play"></use></svg>-->
            </div>

            <div class="bottom">
                <button class="like_btn active">
                    <span>{{report.likes}}</span>
                    <v-icon icon="ic_like"/>
                    <v-icon icon="ic_like_a" />
                </button>
            </div>
        </div>


        <div class="dialog">
            <div class="messages">
                <div class="message">
                    <div class="user">
                        <div class="avatar">
                            <span>АВ</span>
                            <img data-src="/images/tmp/user_avatar.jpg" alt="" class="lozad">
                        </div>

                        <div>
                            <div class="name">
                                <a href="/">Алена Васильева</a>
                            </div>
                            <div class="date">21 августа 18:47</div>
                        </div>
                    </div>

                    <div class="text">
                        <img src="/images/tmp/dialog_img.jpg" alt="">
                    </div>
                </div>

                <div class="message">
                    <div class="user">
                        <div class="avatar">
                            <span>АН</span>
                        </div>

                        <div>
                            <div class="name">
                                <a href="/">Алексей Николае...</a>
                            </div>
                            <div class="date">21 августа 18:47</div>
                        </div>
                    </div>

                    <div class="text">
                        😀
                    </div>
                </div>
            </div>

            <div class="add_message">
                <v-home-smiles-commentary />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "v-task-report",
        props: {
            task: {required: true}
        },
        data () {
            return {

            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {}
    }
</script>
