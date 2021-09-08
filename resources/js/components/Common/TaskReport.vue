<template>
    <div :class="{task_wrap: report.comments.length}">
        <div class="task">
            <div class="head">
                <div class="title">
                    <a :href="`/task/${report.task.id}`">{{report.task.name}}</a>
                </div>

                <div class="date">{{String(report.month).split('-')[1]}} {{month[String(report.month).split('-')[1]]}} {{String(report.time)}}</div>
            </div>

            <div class="author">
                <div class="avatar" v-html="report.user.avatar">
                </div>

                <div>
                    <div class="name">{{report.user.name}}</div>
                    <div class="text">{{report.comment}}</div>
                </div>
            </div>

            <div class="video" v-for="image in report.files">
                <img :src="image" alt="" class="lozad">
                <!--                <svg class="icon"><use xlink:href="/images/sprite.svg#ic_video_play"></use></svg>-->
            </div>

            <div class="bottom">
                <button :class="{like_btn: true, active: user.liked_comment_ids.indexOf(report.id) !== -1}" type="button" @click="like">
                    <span>{{report.likes}}</span>
                    <v-icon icon="ic_like" />
                    <v-icon icon="ic_like_a" />
                </button>

                <v-home-smiles-commentary v-if="!report.comments.length" :show_smiles="false" :show_stickers="true" />
            </div>
        </div>


        <div class="dialog" v-if="report.comments.length">
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
                <v-home-smiles-commentary :smiles="false" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        $sync: ['user'],
        name: "v-task-report",
        props: {
            report: {required: true},
        },
        data () {
            return {
                user: {},
                month: {
                    '01': 'января',
                    '02': 'февраля',
                    '03': 'марта',
                    '04': 'апреля',
                    '05': 'мая',
                    '06': 'июня',
                    '07': 'июля',
                    '08': 'августа',
                    '09': 'сентября',
                    '10': 'октября',
                    '11': 'ноября',
                    '12': 'декабря',
                },
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
            like () {

            }
        }
    }
</script>
