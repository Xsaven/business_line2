<template>
    <div class="message_wrap" ref="wrap" :data-commetary-id="comment.id">

        <div v-show="!reply" class="message">
            <div class="avatar" v-html="comment.user.avatar"></div>

            <div>
                <div class="user_name">
                    <a :href="`/user/${comment.user.id}`">{{comment.user.full_name}}</a>
                </div>

                <div class="text" v-html="comment.text"></div>
            </div>

            <div class="date">{{comment.created_at}}</div>

            <button class="reaply_btn" v-if="iteration < 2 && user.can" type="button" @click="reply_button">Ответить</button>

            <button :class="{like_btn: true, active: user.liked_comment_ids.indexOf(comment.id) !== -1}" type="button" @click="like">
                <span>{{comment.likes}}</span>
                <v-icon icon="ic_like" />
                <v-icon icon="ic_like_a" />
            </button>
        </div>

        <div class="reaply" v-show="iteration < 2 && user.can && reply">
            <button class="cancel_btn" @click="cancel_reply" type="button">
                <v-icon icon="ic_close" />
            </button>

            <div class="parent_message">
                <div class="user_name">{{comment.user.full_name}}</div>
                <div class="text" v-html="comment.text"></div>
            </div>

            <v-home-make-commentary :commentary.sync="comment" :after="cancel_reply" />
        </div>

        <div class="children" v-if="sorted_child.length && !reply">
            <template v-for="(comment_child, comment_child_index) in sorted_child">
                <v-home-commentary
                    :commentary="comment_child"
                    :root.sync="comment"
                    :i="iteration+1"
                    :drop_comment="drop"
                    :key="`home-child-cometary-key-${comment_child.id}`"
                    :scroll="scroll"
                />
            </template>
        </div>
    </div>
</template>

<script>
    import reverse from "lodash/reverse";
    import sortBy from "lodash/sortBy";
    import uniqBy from "lodash/uniqBy";

    export default {
        $sync: ["user"],
        name: "v-home-commentary",
        props: {
            i: {default: 0},
            root: {default: null},
            commentary: {required:true},
            drop_comment: {required:true},
            scroll: {required:true},
        },
        data () {
            return {
                iteration: this.i,
                comment: this.commentary,
                reply: false,
                user: {},
            };
        },
        mounted () {
            ljs.toExec(`comment-update-${this.comment.id}`, this.update.bind(this));
            ljs.toExec(`comment-add-${this.comment.id}`, this.add_to_child.bind(this));
            ljs.toExec(`comment-drop-${this.comment.id}`, () => this.drop_comment(this.comment.id));
            ljs.onetime(() => {
                const observer = lozad('.lozad', {
                    rootMargin: '200px 0px',
                    threshold: 0,
                    loaded: (el) => el.classList.add('loaded')
                });
                observer.observe();
            },200);
        },
        computed: {
            sorted_child () {
                return sortBy(
                    reverse(
                        uniqBy(this.comment.child, 'id')
                    ),
                    ['id']
                );
            }
        },
        watch: {},
        updated() {
            ljs.toExec(`comment-update-${this.comment.id}`, this.update.bind(this));
            ljs.toExec(`comment-add-${this.comment.id}`, this.add_to_child.bind(this));
            ljs.toExec(`comment-drop-${this.comment.id}`, this.drop.bind(this));
        },
        methods: {
            drop (id) {
                this.comment.child = this.comment.child.filter((i) => i.id!==id);
            },
            like () {
                if (this.user.can) ljs.onetime(() => {
                    jax.commentary.like(this.comment.id).then(({liked_comment_ids, comment}) => {
                        if (comment) Object.keys(comment).map((key) => {
                            this.comment[key] = comment[key];
                        })
                        "update".exec();
                        state['user.liked_comment_ids'] = liked_comment_ids;
                    });
                }, 102)
            },
            add_to_child (id) {
                jax.commentary.find(id).then(({data}) => {
                    if (data) {
                        this.comment.child.push(data);
                        this.scroll();
                    }
                });
            },
            update () {
                jax.commentary.find(this.comment.id).then(({data}) => {
                    if (data) Object.keys(data).map((key) => {
                        this.comment[key] = data[key];
                    })
                });
            },
            reply_button() {
                let parent = $(this.$refs.wrap)

                $('.chat .messages .reaply').hide()
                $('.chat .messages .message').fadeIn(200)

                parent.find('> .message').hide()
                parent.find('> .reaply').fadeIn(200)
                setTimeout(() => this.reply = true, 200);
            },
            cancel_reply () {
                this.reply = false
                let parent = $(this.$refs.wrap)
                parent.find('> .reaply').hide()
                parent.find('> .message').fadeIn(200)
                ljs.onetime(() => {
                    const observer = lozad('.lozad', {
                        rootMargin: '200px 0px',
                        threshold: 0,
                        loaded: (el) => el.classList.add('loaded')
                    });
                    observer.observe();
                },98);
            }
        }
    }
</script>
<style>
.chat .messages .reaply {
    display: block;
}
.text a {
    color: #fff;
}
.text img {
    width: 50%;
}
</style>
