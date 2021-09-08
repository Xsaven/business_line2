<template>
    <div :class="{task_wrap: r.comments.length}">
        <div class="task">
            <div class="head">
                <div class="title">
                    <a :href="`/task/${r.task.id}`">{{r.task.name}}</a>
                </div>

                <div class="date">{{r.created_at}}</div>
            </div>

            <div class="author">
                <div class="avatar" v-html="r.user.avatar">
                </div>

                <div>
                    <div class="name">{{r.user.name}}</div>
                    <div class="text">{{r.comment}}</div>
                </div>
            </div>

            <div class="video" v-for="image in r.files">
                <img :src="image" alt="" class="lozad">
                <!--                <svg class="icon"><use xlink:href="/images/sprite.svg#ic_video_play"></use></svg>-->
            </div>

            <div class="bottom">
                <button :class="{like_btn: true, active: user.liked_task_report_ids.indexOf(r.id) !== -1}" type="button" @click="like">
                    <span>{{r.likes}}</span>
                    <v-icon icon="ic_like" />
                    <v-icon icon="ic_like_a" />
                </button>

                <v-home-smiles-commentary v-if="!r.comments.length" :show_smiles="false" :show_stickers="true" />
            </div>
        </div>


        <div class="dialog" v-if="r.comments.length">
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
                r: this.report,
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
        mounted () {
            ljs.toExec(`task-report-update-${this.r.id}`, this.update.bind(this));
        },
        updated() {
            ljs.toExec(`task-report-update-${this.r.id}`, this.update.bind(this));
        },
        computed: {},
        watch: {},
        methods: {
            update () {
                jax.task_report.find(this.r.id).then(({data}) => {
                    this.r = data;
                });
            },
            like () {
                if (this.user.can) ljs.onetime(() => {
                    jax.task_report.like(this.r.id).then(({liked_task_report_ids, report}) => {
                        this.r = report;
                        state['user.liked_task_report_ids'] = liked_task_report_ids;
                        "update".exec();
                    });
                }, 102)
            }
        }
    }
</script>
