<template>
    <a v-if="item" :href="href" :class="item_classes" :data-group="item.id">
        <div class="time"><span>00:01-23:59</span></div>
        <div class="name">{{item.name}}</div>

        <button :class="{favorite_btn: true, active: item.complete_user}">
            <v-icon icon="ic_flag"/>
        </button>
    </a>
    <div v-else :class="{item: true, weekend}"></div>
</template>

<script>
export default {
    $sync: ["user"],
    name: "v-direction-callendar-item",
    props: {
        date: {default: null},
        item: {default: null},
        width: {default: 1},
        weekend: {default: 0},
        left: {default: false},
        right: {default: false},
    },
    data() {
        return {
            user: {}
        };
    },
    mounted() {
    },
    computed: {
        item_classes () {
            return {
                item: true,
                color1: this.item.event_type === 'one-day' && this.item.started,
                color2: this.item.event_type === 'instant' && this.item.started,
                color3: this.item.event_type === 'multi-day' && this.item.started,
                color4: !this.item.started,
                width2: this.width === 2,
                width3: this.width === 3,
                width5: this.width === 5,
                widthfull: this.width === 7,
                break_left: this.left,
                break_right: this.right,
            }
        },
        href () {
            return this.item.started ? `/task/${this.item.id}` : 'javascript:void(0);';
        }
    },
    watch: {},
    methods: {}
}
</script>
