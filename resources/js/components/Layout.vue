<template>
    <div class="wrap">
        <div class="main auth_wrap">
            <v-header />
            <slot></slot>
        </div>
        <v-footer />
    </div>
</template>

<script>
    export default {
        name: "v-layout",
        props: {},
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
