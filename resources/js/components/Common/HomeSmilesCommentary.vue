<template>
    <span>
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
        <div class="fieldset" v-if="user_select && show_select_user" style="display: block">
            <template v-for="(ul, iul) in users_local">
                <a href="javascript:;" :key="`user_selects_${iul}`" @click="select_user(ul.full_name)">
                    <div class="avatar" v-html="ul.avatar"></div>
                    <div class="name">{{ul.full_name}}</div>
                    <v-icon icon="ic_link" @click.stop="open(`/user/${1}`)" />
                </a>
            </template>
        </div>
    </span>
</template>

<script>
    import smiles from '../smiles';
    export default {
        $sync: ['stickers'],
        name: "v-home-smiles-commentary",
        props: {
            user_select: {default: false},
            show_smiles: {default: false},
            show_stickers: {default: true},
            target: {},
            input: {}
        },
        data () {
            return {
                users_local: [],
                stickers: [],
                smiles: smiles,
                show: false,
                show_select_user: false,
            };
        },
        mounted () {
            if (this.target) {
                this.target.addEventListener('keyup', this.textAreaChange.bind(this));
                this.target.addEventListener('click', this.textAreaChange.bind(this));
            }
        },
        beforeDestroy() {
            if (this.target) {
                this.target.removeEventListener('keyup', this.textAreaChange.bind(this));
                this.target.removeEventListener('click', this.textAreaChange.bind(this));
            }
        },
        computed: {},
        watch: {},
        methods: {
            open (link) {
                window.open(link,'_blank');
            },
            select_user (name) {
                let textarea = this.target;
                if (textarea) {
                    name = String(name).replace(/\s/g, '_');
                    let start = textarea.selectionStart;
                    let end = textarea.selectionEnd;
                    let left = textarea.value.substring(0, start);
                    let right = textarea.value.substring(end);
                    let matches = /.*@([a-zа-яA-ZА-Я0-9_\-]*)$/.exec(left);
                    if (matches) {
                        textarea.value = String(left)
                            .replace(matches[1], '') + name + ' ' + right;
                        this.$emit('input', textarea.value);
                        textarea.focus();
                        let l = String(name).length;
                        this.setSelectionRange(textarea, end + l + 1, end + l +1)
                        this.show_select_user = true;
                    }
                }
                this.show_select_user = false;
            },
            textAreaChange () {
                let textarea = this.target;
                let start = textarea.selectionStart;
                let end = textarea.selectionEnd;
                let left = textarea.value.substring(0, start);
                let right = textarea.value.substring(end);
                let matches = /.*@([a-zа-яA-ZА-Я0-9_\-]*)$/.exec(left);
                if (matches) {
                    this.users(String(matches[1]).replace(/_/g, '')).then(() => {
                        this.show_select_user = true;
                    });
                } else {
                    this.show_select_user = false;
                }
            },
            setSelectionRange(input, selectionStart, selectionEnd) {
                if (input.setSelectionRange) {
                    input.focus();
                    input.setSelectionRange(selectionStart, selectionEnd);
                }
                else if (input.createTextRange) {
                    let range = input.createTextRange();
                    range.collapse(true);
                    range.moveEnd('character', selectionEnd);
                    range.moveStart('character', selectionStart);
                    range.select();
                }
            },
            users(q) {
                return jax.user.search_users(q)
                    .then((data) => {
                        this.users_local = data
                    })
            },
            emoji_click (emoji) {
                this.$emit('emoji', emoji);
                this.toggle();
                let textarea = this.target;
                if (textarea) {
                    let start = textarea.selectionStart;
                    let end = textarea.selectionEnd;
                    textarea.value = textarea.value.substring(0, start) + ' ' + emoji + ' ' + textarea.value.substring(end);
                    this.$emit('input', textarea.value);
                    textarea.focus();
                    this.setSelectionRange(textarea, end + 5, end + 5)
                    //textarea.selectionEnd = end + 3;
                }
            },
            sticker_click (id) {
                this.$emit('sticker', id);
                this.toggle();
                let textarea = this.target;
                if (textarea) {
                    let start = textarea.selectionStart;
                    let end = textarea.selectionEnd;
                    textarea.value = textarea.value.substring(0, start) + ` [${id}] ` + textarea.value.substring(end);
                    textarea.focus();
                    this.setSelectionRange(textarea, end + 5, end + 5)
                    //textarea.selectionEnd = end + 3;
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
