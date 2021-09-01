<template>
    <div class="chat">
        <div class="messages">
            <template v-for="(commentary, commentary_index) in comments">
                <v-home-commentary :commentary="commentary" />
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

                <v-home-smiles-commentary />

                <v-home-field-set-commentary />
            </form>
        </div>
    </div>
</template>

<script>
import {isEmail, isLengthBetween, isRequired} from "../rules";

export default {
        name: "v-home-commentaries",
        props: {
            commentaries: {required:true}
        },
        data () {
            return {
                message: '',
                comments: this.commentaries
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
            update_list () {

            },
            sendCommentary () {
                if (!isRequired(this.message) || !isLengthBetween(this.message, 1, 1200)) {
                    return "toast:error".exec("Минимум 1 символ!");
                }

                const message = this.message;
                this.message = ''

                jax.commentary.home_commentary(message).then(() => {

                });
            }
        }
    }
</script>
