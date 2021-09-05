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
                plugin: null
            };
        },
        mounted () {
          this.plugin = $(this.$refs.s).niceSelect();
          this.plugin.on('change', (e) => {
            this.$emit('input', e.target.value)
          });
        },
        computed: {},
        watch: {
          value (val) {
            this.plugin.val(val);
          }
        },
        methods: {}
    }
</script>
