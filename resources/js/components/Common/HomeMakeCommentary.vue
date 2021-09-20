<template>
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

            <v-home-smiles-commentary v-if="myref" :show_smiles="true" :user_select="true" :show_stickers="false" v-model="message" :target="myref" />
        </form>
    </div>
</template>

<script>
import {isLengthBetween, isRequired} from "../rules";

export default {
        $sync: ['user'],
        name: "v-home-make-commentary",
        props: {
            commentary: {required:true},
            after: {type: Function},
        },
        data () {
            return {
                myref: null,
                message: '',
                user: {}
            };
        },
        mounted () {
            this.myref = this.$refs.d;
        },
        computed: {},
        watch: {},
        methods: {
            sendCommentary () {
                if (!isRequired(this.message) || !isLengthBetween(this.message, 1, 1200)) {
                    return "toast:error".exec("Минимум 1 символ!");
                }

                const message = this.message;
                this.message = ''

                jax.commentary.answer_commentary(message, this.commentary.id).then(({result, comment}) => {
                    if (result && this.user.active_commentaries) {
                        this.commentary.child.push(comment);
                    } else {
                        "toast:info".exec("Ваш комментарий был отправлен на модерацию!");
                    }
                });

                // let parent = $('.chat .messages .reaply .cancel_btn').closest('.message_wrap')
                // parent.find('> .reaply').hide()
                // parent.find('> .message').fadeIn(200)

                if (this.after) {
                    this.after();
                }
            }
        }
    }
</script>
