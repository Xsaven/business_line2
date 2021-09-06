<template>
    <div class="search modal_cont">
        <button @click.stop.prevent="open" ref="b" class="btn mini_modal_btn">
            <v-icon icon="ic_search" />
        </button>

        <div class="mini_modal" ref="modal">
            <form action="/search" method="get" class="form" @submit="close">
                <input type="text" name="q" :value="ljs.help.query_get('q')" class="input" placeholder="Поиск по сайту">

                <button type="submit" class="submit_btn">
                    <v-icon icon="ic_search" />
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "v-search-modal",
        props: {},
        data () {
            return {

            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
            open () {
                const modal = $(this.$refs.modal);
                const button = $(this.$refs.b);

                if (button.hasClass('active')) {
                    button.removeClass('active')
                    $('.mini_modal').removeClass('active')
                    if (is_touch_device()) $('body').css('cursor', 'default')
                } else {
                    $('.mini_modal_btn').removeClass('active')
                    button.addClass('active')

                    $('.mini_modal').removeClass('active')
                    modal.addClass('active')

                    setTimeout(() => {
                        modal.find('input').focus()
                    }, 100)

                    if (is_touch_device()) $('body').css('cursor', 'pointer')
                }
            },
            close () {
                const modal = $(this.$refs.modal);
                const button = $(this.$refs.b);
                button.removeClass('active')
                $('.mini_modal').removeClass('active')
                if (is_touch_device()) $('body').css('cursor', 'default')
            }
        }
    }
</script>
