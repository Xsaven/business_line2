<template>
    <div class="smiles modal_cont">
        <button type="button" ref="btn" class="btn mini_modal_btn" @click="toggle">
            <v-icon icon="ic_smile" />
        </button>

        <div :class="{mini_modal: true}" ref="mini_modal">
            <button type="button" class="close_btn">
                <v-icon icon="ic_close" />
            </button>

            <div class="section">
                <div class="title">Эмоджи</div>

                <div class="row">
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                    <div><img src="/images/tmp/smile_img.png" alt=""></div>
                </div>
            </div>
            <div class="section stickers">
                <div class="title">Стикеры</div>

                <div class="row">
                    <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                    <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                    <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                    <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                    <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                    <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "v-home-smiles-commentary",
        props: {},
        data () {
            return {
                show: false
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
            toggle () {
                const modal = $(this.$refs.mini_modal);
                const btn = $(this.$refs.btn);

                if (btn.hasClass('active')) {
                    btn.removeClass('active')
                    $('.mini_modal').removeClass('active')

                    if (is_touch_device()) $('body').css('cursor', 'default')
                } else {
                    $('.mini_modal_btn').removeClass('active')
                    btn.addClass('active')

                    $('.mini_modal').removeClass('active')

                    setTimeout(() => {
                        modal.addClass('active')
                        modal.find('input').focus()
                    }, 100)

                    if (is_touch_device()) $('body').css('cursor', 'pointer')
                }
            }
        }
    }
</script>
