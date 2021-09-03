<template>
    <select @change="$emit('input', $event.target.value)" ref="s"><slot></slot></select>
</template>

<script>
    export default {
        name: "v-select",
        props: {
          value: null
        },
        data () {
            return {

            };
        },
        mounted () {
          $(this.$refs.s).niceSelect();
        },
        computed: {},
        watch: {},
        methods: {}
    }
</script>
