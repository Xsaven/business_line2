<template>
    <div class="wrap">
        <div class="main auth_wrap">
            <header class="no_margin">
                <button class="close"></button>

                <div class="mob_scroll">
                    <div class="cont row">
                        <a href="/" class="logo">
                            <img src="/images/logo.svg" alt="">
                        </a>
                    </div>
                </div>
            </header>


            <section class="auth">
                <div class="cont row">
                    <div class="info">
<!--                        <img src="/images/twenty_years.svg" alt="" class="twenty_years">-->
                        <img src="/images/auth_img2.png" alt="" class="img">

<!--                        <div class="slogan">Присоединяйся к нам и выигрывай крутые призы!</div>-->
                    </div>

                    <div class="data">

                        <form class="form change_pass_form" style="display: block" @submit.prevent.stop="recovery_submit">
                            <div class="title">Изменение пароля</div>

                            <div class="line">
                                <div class="field">
                                    <input v-model="recovery.password" type="password"
                                           :class="{input: true, error: errors.password}"
                                           placeholder="Введите пароль" @click="clear_errors" @blur="clear_errors">
                                    <div class="exp">{{ errors.password }}</div>
                                </div>
                            </div>

                            <div class="line">
                                <div class="field">
                                    <input v-model="recovery.password_confirmation" type="password" class="input"
                                           placeholder="Повторите пароль" @click="clear_errors" @blur="clear_errors">
                                </div>
                            </div>

                            <div class="submit">
                                <button type="submit" class="submit_btn">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>


        <footer>
            <div class="cont row">
                <div class="copyright">&copy; ГК «Деловые Линии», 2001–2021</div>

                <div class="links" v-if="Number(support)">
                    <div><a href="/">Техническая поддержка</a></div>
                </div>
            </div>

            <img data-src="/images/bg_footer.svg" alt="" class="lozad bg">
        </footer>


        <div class="overlay"></div>
    </div>
</template>

<script>
import {isRequired, isNumber, isLengthBetween, isBetween, isEmail, isTrue} from '../rules';

export default {
    $sync: ['support'],
    name: "pages_new_password",
    props: {
        token: {required: true},
        email: {required: true},
    },
    data() {
        return {
            support: 1,
            recovery: {
                password: '',
                password_confirmation: '',
            },
            errors: {
                password: null,
            }
        };
    },
    mounted() {
    },
    computed: {},
    watch: {},
    methods: {
        recovery_submit() {
            this.clear_errors();
            if (
                !isRequired(this.recovery.password) ||
                !isLengthBetween(this.recovery.password, 6, 191) ||
                !this.validPassword(this.recovery.password)
            ) {
                this.errors.password = "Пароль должен содержать 6 и более символов, прописные латинские буквы, строчные латинские буквы, цифры";
                return;
            }
            if (this.recovery.password !== this.recovery.password_confirmation) {
                this.errors.password = "Пароли должны совпадать";
                return;
            }

            ljs.$jax.post('/reset-password', {
                email: this.email,
                token: this.token,
                password: this.recovery.password,
                password_confirmation: this.recovery.password_confirmation,
                _token: ljs.token,
            }).then(() => {
                "doc::location".exec("/");
            }).catch(() => {
                this.errors.password = "Пароль должен содержать 6 и более символов, прописные латинские буквы, строчные латинские буквы, цифры";
            });
        },
        clear_errors() {
            Object.keys(this.errors).map((key) => this.$set(this.errors, key, null));
        },
        validPassword(password) {
            let re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/;
            return re.test(password);
        }
    }
}
</script>
