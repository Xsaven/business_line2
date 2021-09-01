<template>
    <div class="message_wrap">

        <div class="message">
            <div class="avatar" v-html="commentary.user.avatar"></div>

            <div>
                <div class="user_name">
                    <a href="/">{{commentary.user.full_name}}</a>
                </div>

                <div class="text">{{commentary.text}}</div>
            </div>

            <div class="date">{{commentary.created_at}}</div>

            <button class="reaply_btn" v-if="iteration <= 3">Ответить</button>

            <button class="like_btn">
                <span>{{commentary.likes}}</span>
                <v-icon icon="ic_like" />
                <v-icon icon="ic_like_a" />
            </button>
        </div>

        <div class="reaply" v-if="iteration <= 3">
            <button class="cancel_btn">
                <v-icon icon="ic_close" />
            </button>

            <div class="parent_message">
                <div class="user_name">{{commentary.user.full_name}}</div>
                <div class="text">{{commentary.text}}</div>
            </div>

            <v-home-make-commentary />
        </div>

        <div class="children" v-if="commentary.child">
            <template v-for="comment in commentary.child">
                <v-home-commentary :commentary="comment" :root="commentary" :i="iteration+1" />
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        name: "v-home-commentary",
        props: {
            i: {default: 0},
            root: {default: null},
            commentary: {required:true},
        },
        data () {
            return {
                iteration: this.i
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {}
    }
</script>
