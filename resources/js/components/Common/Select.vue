<template>
    <select ref="s"><slot></slot></select>
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
          $(this.$refs.s).niceSelect().on('change', (e) => {
            this.$emit('input', e.target.value)
          });
        },
        computed: {},
        watch: {},
        methods: {}
    }
</script>
