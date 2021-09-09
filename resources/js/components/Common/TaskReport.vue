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

            <div class="video">
                <img :src="r.file" alt="" class="lozad">
                <!--                <svg class="icon"><use xlink:href="/images/sprite.svg#ic_video_play"></use></svg>-->
            </div>

            <div class="bottom">
                <button :class="{like_btn: true, active: user.liked_task_report_ids.indexOf(r.id) !== -1}" type="button" @click="like">
                    <span>{{r.likes}}</span>
                    <v-icon icon="ic_like" />
                    <v-icon icon="ic_like_a" />
                </button>

                <v-home-smiles-commentary
                    v-if="!r.comments.length"
                    :show_smiles="false"
                    :show_stickers="true"
                    @sticker="sticker"
                />
            </div>
        </div>


        <div class="dialog" v-if="r.comments.length">
            <div class="messages">

                <div class="message" v-for="comment in r.comments">
                    <div class="user">
                        <div class="avatar" v-html="comment.user.avatar"></div>

                        <div>
                            <div class="name">
                                <a :href="`/user/${comment.user.id}`">{{comment.user.full_name}}</a>
                            </div>
                            <div class="date">{{comment.created_at}}</div>
                        </div>
                    </div>

                    <div class="text" v-html="comment.text"></div>
                </div>

            </div>

            <div class="add_message">
                <v-home-smiles-commentary
                    :show_smiles="false"
                    :show_stickers="true"
                    @sticker="sticker"
                />
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
            sticker (id) {
                jax.task_report.comment(this.r.id, `[${id}]`).then(({report}) => {
                    this.r = report;
                });
            },
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
