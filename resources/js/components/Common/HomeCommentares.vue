<template>
    <div class="chat">
        <div class="messages" ref="mess_list" @scroll="scroll">
            <template v-for="(commentary, commentary_index) in sorted_comments">
                <v-home-commentary :commentary="commentary" :drop_comment="drop" :key="`home-cometary-key-${commentary.id}`" :scroll="scrollToBottom" />
            </template>
        </div>


        <div class="add_message">
            <form @submit.stop.prevent="sendCommentary">
                <textarea
                    v-model="message"
                    placeholder="Написать комментарий"
                    ref="d"
                    @keyup.ctrl.enter="sendCommentary"
                    @keyup.alt.enter="sendCommentary"
                ></textarea>

                <button type="submit" class="submit_btn">
                    <v-icon icon="ic_send" />
                </button>

                <v-home-smiles-commentary v-if="myref" :show_smiles="true" :user_select="true" :show_stickers="!!Number(stickers_home)" v-model="message" :target="myref" />
            </form>
        </div>
    </div>
</template>

<script>
import {isLengthBetween, isRequired} from "../rules";
import reverse from "lodash/reverse";
import sortBy from "lodash/sortBy";
import uniqBy from "lodash/uniqBy";

export default {
        $sync: ["user", "stickers_home"],
        $exec: ["update_list", "add_to_child", "drop"],
        name: "v-home-commentaries",
        props: {
            commentaries: {required:true}
        },
        data () {
            return {
                stickers_home: 1,
                myref: null,
                page: 0,
                message: '',
                comments: this.commentaries,
                user: {}
            };
        },
        mounted () {
            this.myref = this.$refs.d;
            ljs.onetime(() => {
                $('.messages')[0].scrollTo(0,document.querySelector(".messages").scrollHeight+99999);
            }, 205)
        },
        computed: {
            sorted_comments () {
                return sortBy(
                    reverse(
                        uniqBy(this.comments, 'id')
                    ),
                    ['id']
                );
            }
        },
        watch: {},
        methods: {
            drop (id) {
                this.comments = this.comments.filter((i) => i.id!==id);
            },
            add_to_child (id) {
                jax.commentary.find(id).then(({data}) => {
                    if (data) {
                        this.scrollToBottom();
                        this.comments.push(data);
                        this.scrollToBottom();
                    }
                });
            },
            scroll (e) {
                if (this.comments.length >= 100) {
                    let position = document.querySelector(".messages").scrollTop;
                    if (position < 100) {
                        let last = Number(this.sorted_comments[0].id);
                        ljs.onetime(() => {
                            this.page++;
                            jax.param('page', this.page).commentary.home_commentary_list().then(({data}) => {
                                this.comments.push(...data);
                                if (data.length) {
                                    ljs.onetime(() => {
                                        $('.messages')[0].scrollTop = $(`[data-commetary-id=${last}]`)[0].offsetTop;
                                    }, 10);
                                }
                            });
                        }, 200);
                    }
                }
            },
            update_list () {
                jax.commentary.home_commentary_list().then(({data}) => {
                    this.$set(this, 'comments', reverse(data));
                });
            },
            sendCommentary () {

                if (!isRequired(this.message) || !isLengthBetween(this.message, 1, 1200)) {
                    return "toast:error".exec("Минимум 1 символ!");
                }

                const message = this.message;
                this.message = ''

                if (this.user.can) {
                    jax.commentary.home_commentary(message).then(({result, comment, obscenities}) => {
                        if (!obscenities) {
                            "toast:error".exec("Использование мата запрещено по правилам участия!");
                            this.message = message;
                        } else if (result && this.user.active_commentaries) {
                            this.comments.push(comment);
                            this.scrollToBottom(true);
                        } else {
                            "toast:info".exec("Ваш комментарий был отправлен на модерацию!");
                        }
                    });
                } else {
                    // "toast:error".exec("Использование чата в режиме магазина отключено!");
                }
            },
            scrollToBottom (force = false) {
                let h1 = document.querySelector(".messages").scrollHeight-document.querySelector(".messages").offsetHeight;
                let h2 = document.querySelector(".messages").scrollTop+75;
                if (h2 >= h1 || force) {
                    $('.messages').animate({
                        scrollTop: document.querySelector(".messages").scrollHeight
                    }, 500);
                }
            }
        }
    }
</script>
