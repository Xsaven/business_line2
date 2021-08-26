<template>
    <v-layout>
        <section class="participation_rules">
            <div class="cont">
                <div class="block_head">
                    <div class="title">Правила участия </div>
                </div>

                <div class="text_block">
                    <div class="columns" v-html="rules_local.value"></div>
                </div>
            </div>
        </section>
    </v-layout>
</template>

<script>
    export default {
        name: "pages_rule",
        props: {
            rules: {required:true}
        },
        data () {
            return {
                rules_local: this.rules
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {}
    }
</script>
