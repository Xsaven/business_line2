<template>
    <div class="message_wrap" ref="wrap" :data-commetary-id="comment.id">

        <div v-if="!reply" class="message">
            <div class="avatar" v-html="comment.user.avatar"></div>

            <div>
                <div class="user_name">
                    <a href="/">{{comment.user.full_name}}</a>
                </div>

                <div class="text">{{comment.text}}</div>
            </div>

            <div class="date">{{comment.created_at}}</div>

            <button class="reaply_btn" v-if="iteration < 2 && user.can" type="button" @click="reply_button">Ответить</button>

            <button :class="{like_btn: true, active: user.liked_comment_ids.indexOf(comment.id) !== -1}" type="button" @click="like">
                <span>{{comment.likes}}</span>
                <v-icon icon="ic_like" />
                <v-icon icon="ic_like_a" />
            </button>
        </div>

        <div v-else class="reaply" v-if="iteration < 2 && user.can">
            <button class="cancel_btn" @click="cancel_reply" type="button">
                <v-icon icon="ic_close" />
            </button>

            <div class="parent_message">
                <div class="user_name">{{comment.user.full_name}}</div>
                <div class="text">{{comment.text}}</div>
            </div>

            <v-home-make-commentary :commentary.sync="comment" :after="cancel_reply" />
        </div>

        <div class="children" v-if="sorted_child">
            <template v-for="comment_child in sorted_child">
                <v-home-commentary :commentary="comment_child" :root="comment" :i="iteration+1" />
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
            state[`comment_update_${this.comment.id}`] = () => this.update();
            state[`comment_add_child_${this.comment.id}`] = (id) => this.add_to_child(id);
            state[`comment_drop_child_${this.comment.id}`] = (id) => this.drop(id);
        },
        beforeDestroy() {
            delete state.update_home_notifications;
            delete state.add_to_child;
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
        methods: {
            drop (id) {
                this.comments = this.comment.child.filter((i) => i.id!==id);
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
                    if (data) this.comment.child.push(data);
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
                //setTimeout(() => this.reply = false, 100);
            }
        }
    }
</script>
