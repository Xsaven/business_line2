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
                    <div class="name">
                        <a :href="`/user/${r.user.id}`" style="color: currentColor;">{{r.user.full_name}}</a>
                        <span v-if="r.fun"> болеет за <a :href="`/user/${r.fun.id}`" style="color: currentColor;">{{r.fun.full_name}}</a></span>
                    </div>
                    <div class="text" v-html="r.comment" v-if="r.file"></div>
                </div>
            </div>

            <div class="video" v-if="r.file">
                <v-player v-if="String(r.file).indexOf('.jpg') === -1 && String(r.file).indexOf('.jpeg') === -1 && String(r.file).indexOf('.png') === -1" :video_id="r.file" />
                <img v-else :src="r.file" alt="" class="lozad">
                <!--                <svg class="icon"><use xlink:href="/images/sprite.svg#ic_video_play"></use></svg>-->
            </div>
            <div class="desc" v-else-if="r.comment" v-html="r.comment"></div>

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
            <div class="messages" ref="m">

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
    import {isNumber} from "../rules";

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
            ljs.onetime(() => {
                const observer = lozad('.lozad', {
                    rootMargin: '200px 0px',
                    threshold: 0,
                    loaded: (el) => el.classList.add('loaded')
                });
                observer.observe();
            },200);
            ljs.toExec(`task-report-update-${this.r.id}`, this.update.bind(this));
            this.scrollDown();
            ljs.onetime(() => this.scrollDown(), 101)
        },
        updated() {
            ljs.toExec(`task-report-update-${this.r.id}`, this.update.bind(this));
        },
        computed: {},
        watch: {},
        methods: {
            scrollDown () {
                if (this.$refs.m) {
                    this.$refs.m.scrollTo(0,this.$refs.m.scrollHeight);
                }
            },
            num (num) {
                return isNumber(num)
            },
            sticker (id) {
                if (this.user.can) jax.task_report.comment(this.r.id, `[${id}]`).then(({report}) => {
                    this.r = report;
                    this.to_all();
                    ljs.onetime(() => this.scrollDown(), 101)
                });
            },
            update () {
                "update".exec();
                jax.task_report.find(this.r.id).then(({data}) => {
                    this.r = data;
                    ljs.onetime(() => this.scrollDown(), 102)
                });
            },
            like () {
                if (this.user.can && this.r.user.id !== this.user.id) ljs.onetime(() => {
                    jax.task_report.like(this.r.id).then(({liked_task_report_ids, report}) => {
                        this.r = report;
                        state['user.liked_task_report_ids'] = liked_task_report_ids;
                        "update".exec();
                        this.to_all();
                    });
                }, 102)
            },
            to_all () {
                state.to_all(`task-report-update-${this.r.id}`);
            }
        }
    }
</script>
