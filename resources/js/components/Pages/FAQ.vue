<template>
    <v-layout>
        <section class="faq">
            <div class="cont">
                <div class="block_head center">
                    <div class="title">FAQ</div>
                </div>
                <div class="list">
                    <div class="item" v-for="faq in faqs">
                        <div class="question">{{ faq.question }}</div>

                        <div class="answer">{{faq.answer}}</div>
                    </div>
                </div>
            </div>
        </section>
    </v-layout>
</template>
<script>
    export default {
        name: "pages_f_a_q",
        props: {
            faqs: {required: true}
        },
        data () {
            return {
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {}
    }
</script>
