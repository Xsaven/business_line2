<template>
    <div class="smiles modal_cont">
        <button type="button" ref="btn" class="btn mini_modal_btn" @click="toggle">
            <v-icon icon="ic_smile" />
        </button>

        <div :class="{mini_modal: true}" ref="mini_modal">
            <button type="button" class="close_btn" @click="toggle">
                <v-icon icon="ic_close" />
            </button>

            <div class="section" v-if="show_smiles">
                <div class="title">Эмодзи</div>

                <div class="row">
                    <div v-for="smile in smiles" @click="emoji_click(smile)" style="cursor: pointer">{{smile}}</div>
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
    import smiles from '../smiles';
    export default {
        $sync: ['stickers'],
        name: "v-home-smiles-commentary",
        props: {
            show_smiles: {default: false},
            show_stickers: {default: true},
            target: {}
        },
        data () {
            return {
                stickers: [],
                smiles: smiles,
                show: false
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
            emoji_click (emoji) {
                this.$emit('emoji', emoji);
                this.toggle();
                let textarea = this.target;
                if (textarea) {
                    let start = textarea.selectionStart;
                    let end = textarea.selectionEnd;
                    textarea.value = textarea.value.substring(0, start) + emoji + textarea.value.substring(end);
                    textarea.focus();
                    textarea.selectionEnd = end + 3;
                }
            },
            sticker_click (id) {
                this.$emit('sticker', id);
                this.toggle();
                let textarea = this.target;
                if (textarea) {
                    let start = textarea.selectionStart;
                    let end = textarea.selectionEnd;
                    textarea.value = textarea.value.substring(0, start) + `[${id}]` + textarea.value.substring(end);
                    textarea.focus();
                    textarea.selectionEnd = end + 3;
                }
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
