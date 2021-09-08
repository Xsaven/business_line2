<template>
    <div class="smiles modal_cont">
        <button type="button" ref="btn" class="btn mini_modal_btn" @click="toggle">
            <v-icon icon="ic_smile" />
        </button>

        <div :class="{mini_modal: true}" ref="mini_modal">
            <button type="button" class="close_btn">
                <v-icon icon="ic_close" />
            </button>

            <div class="section" v-if="smiles">
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
            <div class="section stickers" v-if="stickers.length && show_stickers">
                <div class="title">Стикеры</div>

                <div class="row">
                    <template v-for="sticker in stickers">
                        <div @click="sticker_click(sticker.id)">
                            <img :src="sticker.src" :alt="sticker.src">
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        $sync: ['stickers'],
        name: "v-home-smiles-commentary",
        props: {
            show_smiles: {default: true},
            show_stickers: {default: false},
        },
        data () {
            return {
                stickers: [],
                show: false
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
            sticker_click (id) {
                this.$emit('sticker', id);
                this.toggle();
            },
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
