<template>
    <svg class="icon" @click="$emit('click', $event)">
        <use v-bind="{'xlink:href' : `${url}/images/sprite.svg#${icon}`}"></use>
    </svg>
</template>

<script>
    export default {
        name: "svg_icon",
        props: ['icon'],
        data () {
            return {
                url: window.location.origin
            };
        },
        mounted () {},
        methods: {}
    }
</script>
