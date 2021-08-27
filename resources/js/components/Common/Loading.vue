<template>
    <v-loading-plugin :active="active" spinner="bar-fade-scale" color="#383838" :is-full-screen="isFullScreen" />
</template>

<script>
    export default {
        name: "v-loading",
        props: {
            active: {},
            isFullScreen: {default: false}
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