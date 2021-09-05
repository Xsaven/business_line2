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
                        <img src="/images/twenty_years.svg" alt="" class="twenty_years">
                        <img src="/images/auth_img.png" alt="" class="img">

                        <div class="slogan">Присоединяйся к нам и выигрывай крутые призы!</div>
                    </div>

                    <div class="data">
                        <form class="form login_form" @submit.stop.prevent="login_submit">
                            <div class="title">Первый шаг к победе</div>

                            <div class="line">
                                <div class="field">
                                    <input v-model="auth.login" type="text" :class="{input: true, error: errors.login}"
                                           placeholder="Табельный номер" @click="clear_errors" @blur="clear_errors">
                                    <div class="exp">{{ errors.login }}</div>
                                </div>
                            </div>

                            <div class="line">
                                <div class="field">
                                    <input v-model="auth.password" type="password"
                                           :class="{input: true, error: errors.password}"
                                           placeholder="Пароль" @click="clear_errors" @blur="clear_errors">
                                    <div class="exp">{{ errors.password }}</div>
                                </div>
                            </div>

                            <div class="submit">
                                <button type="submit" class="submit_btn">Войти</button>
                            </div>

                            <div class="btns">
                                <button type="button" class="btn recovery_btn" @click="recovery_form">Забыли пароль?
                                </button>
                                <button type="button" class="btn register_btn" @click="register_form">
                                    Зарегистрироваться
                                </button>
                            </div>
                        </form>


                        <form class="form recovery_form" @submit.prevent.stop="recovery_submit">
                            <div class="title">Восстановление пароля</div>

                            <div class="line">
                                <div class="label">Введите почту, указанную при регистрации</div>

                                <div class="field">
                                    <input v-model="recovery.email" type="email" @click="clear_errors"
                                           @blur="clear_errors"
                                           :class="{input: true, error: errors.email}" placeholder="">

                                    <div class="error_text" v-if="errors.email">{{ errors.email }}</div>
                                </div>
                            </div>

                            <div class="submit">
                                <button type="submit" class="submit_btn">Получить ссылку для входа</button>
                            </div>

                            <div class="btns">
                                <button type="button" class="btn login_btn" @click="login_form">Назад</button>
                            </div>
                        </form>


                        <div class="recovery_success">
                            <div class="title">Восстановление пароля</div>

                            <div class="text">
                                <v-icon icon="ic_success"/>

                                <div>Мы отправили письмо со ссылкой для восстановления пароля по адресу
                                    {{ recovery.email }}
                                </div>

                                <div><small>Убедитесь, что оно не попапло в папку «Спам».<br> Ссылка действительна в
                                    течение 24 часов.</small></div>
                            </div>

                            <div class="btns">
                                <button type="button" class="btn login_btn" @click="recovery_form">Назад</button>
                            </div>
                        </div>


                        <form class="form add_email_form" @submit.stop.prevent="enter_register_password" style="display: none">
                            <div class="title">Ваш E-mail</div>

                            <div class="line" v-if="!empty_email">
                                <div class="field">
                                    <input v-model="registration.email" type="email"
                                           :class="{input: true, error: errors.email}"
                                           :disabled="!empty_email"
                                           placeholder="Введите корпоративный или личный e-mail" @click="clear_errors"
                                           @blur="clear_errors">
                                    <div class="exp">{{ errors.email }}</div>
                                </div>
                            </div>


                            <div class="line" v-if="empty_email">
                                <div class="field">
                                    <input v-model="registration.email" type="email"
                                           :class="{input: true, error: errors.email}"
                                           placeholder="Введите корпоративный или личный e-mail" @click="clear_errors"
                                           @blur="clear_errors">
                                    <div class="exp">{{ errors.email }}</div>
                                </div>
                            </div>
                            <div class="line" v-if="empty_email">
                                <div class="field">
                                    <input v-model="registration.email_confirmation" type="email"
                                           :class="{input: true, error: errors.email}"
                                           placeholder="Повторите ввод" @click="clear_errors"
                                           @blur="clear_errors">
                                </div>
                            </div>

                            <div class="line agree">
                                <div class="field">
                                    <label>Запомните эту почту на случай восстановления пароля.</label>
                                </div>
                            </div>

                            <div class="submit">
                                <button type="submit" class="submit_btn">Продолжить</button>
                            </div>

                            <div class="btns">
                                <div>Уже зарегистрированы?
                                    <button type="button" class="btn login_btn" @click="login_form">Войти</button>
                                </div>
                            </div>
                        </form>

                        <form class="form register_form" @submit.stop.prevent="enter_register_email">
                            <div class="title">Регистрация</div>

                            <div class="columns row">
                                <div class="line">
                                    <div class="field">
                                        <input v-model="registration.name" type="text"
                                               :class="{input: true, error: errors.name}"
                                               placeholder="Имя" @click="clear_errors" @blur="clear_errors">
                                        <div class="exp">{{ errors.name }}</div>
                                    </div>
                                </div>

                                <div class="line">
                                    <div class="field">
                                        <input v-model="registration.lastname" type="text"
                                               :class="{input: true, error: errors.lastname}"
                                               placeholder="Фамилия" @click="clear_errors" @blur="clear_errors">
                                        <div class="exp">{{ errors.lastname }}</div>
                                    </div>
                                </div>

                                <div class="line">
                                    <div class="field">
                                        <input v-model="registration.number" type="text"
                                               :class="{input: true, error: errors.number}"
                                               placeholder="Табельный номер" @click="clear_errors" @blur="clear_errors">
                                        <div class="exp">{{ errors.number }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="line agree">
                                <div class="field">
                                    <input v-model="registration.agree" type="checkbox" id="agree_check">
                                    <label for="agree_check">Я согласен на обработку персональных данных</label>
                                </div>
                            </div>

                            <div class="submit">
                                <button type="submit" class="submit_btn">Продолжить</button>
                            </div>

                            <div class="btns">
                                <div>Уже зарегистрированные?
                                    <button type="button" class="btn login_btn" @click="login_form">Войти</button>
                                </div>
                            </div>
                        </form>


                        <form class="form add_password_form" @submit.stop.prevent="registration_submit">
                            <div class="title">Придумайте пароль</div>

                            <div class="line">
                                <div class="field">
                                    <input v-model="registration.password" type="password"
                                           :class="{input: true, error: errors.password}"
                                           placeholder="Введите пароль" @click="clear_errors" @blur="clear_errors">
                                    <div class="exp">{{ errors.password }}</div>
                                </div>
                            </div>

                            <div class="line">
                                <div class="field">
                                    <input v-model="registration.password_confirmation" type="password" class="input"
                                           placeholder="Повторите пароль" @click="clear_errors" @blur="clear_errors">
                                </div>
                            </div>

                            <div class="submit">
                                <button type="submit" class="submit_btn">Зарегистрироваться</button>
                            </div>

                            <div class="btns">
                                <div>Уже зарегистрированные?
                                    <button type="button" class="btn login_btn" @click="login_form">Войти</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>


        <footer>
            <div class="cont row">
                <div class="copyright">&copy; ГК «Деловые Линии», 2001–2021</div>

                <div class="links">
                    <div><a href="/guest_support">Техническая поддержка</a></div>
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
    name: "auth",
    props: {},
    data() {
        return {
            empty_email: true,
            auth: {
                login: '',
                password: '',
            },
            registration: {
                name: '',
                lastname: '',
                number: '',
                email: '',
                email_confirmation: '',
                password: '',
                password_confirmation: '',
                agree: true,
            },
            recovery: {
                email: '',
            },
            errors: {
                name: null,
                lastname: null,
                number: null,
                email: null,
                login: null,
                password: null,
            }
        };
    },
    mounted() {
    },
    computed: {},
    watch: {},
    methods: {
        find_email () {

        },
        recovery_submit() {
            this.clear_errors();
            if (!isRequired(this.recovery.email) || !isEmail(this.recovery.email)) {
                this.errors.email = "e-mail не зарегистрирован";
                return;
            }

            ljs.$jax.post('/forgot-password', {
                email: this.recovery.email,
                _token: ljs.token
            }).then(() => {
                this.recovery_success();
            }).catch(() => {
                this.errors.email = "e-mail не зарегистрирован";
            });
        },
        login_submit() {
            this.clear_errors();
            if (!isRequired(this.auth.login) || !isLengthBetween(this.auth.login, 1, 191)) {
                this.errors.login = "Имя обязательно для ввода и должно содержать от 1 до 191 символов";
                return;
            }
            if (!isRequired(this.auth.password) || !isLengthBetween(this.auth.password, 6, 191)) {
                this.errors.password = "Пароль должен содержать 6 и более символов, прописные латинские буквы, строчные латинские буквы, цифры";
                return;
            }

            jax.guest.login(this.auth.login, this.auth.password)
                .then(({result}) => {
                    this.clear_errors();
                    if (!result) "toast:error".exec("Пользователь с такими данными не найден!");
                    this.auth.password = '';
                });
        },
        registration_submit() {
            this.clear_errors();
            if (
                !isRequired(this.registration.password) ||
                !isLengthBetween(this.registration.password, 6, 191) ||
                !this.validPassword(this.registration.password)
            ) {
                this.errors.password = "Пароль должен содержать 6 и более символов, прописные латинские буквы, строчные латинские буквы, цифры";
                return;
            }
            if (this.registration.password !== this.registration.password_confirmation) {
                this.errors.password = "Пароли должны совпадать";
                return;
            }

            jax.guest.registration(...Object.values(this.registration))
                .then(({result}) => {
                    this.clear_errors();
                    if (!result) "toast:error".exec("Введены некорректные данные");
                });
        },
        register_form() {
            this.clear_errors();
            $('.auth .data > *').hide();
            $('.auth .data .register_form').fadeIn(300);
        },
        recovery_form() {
            this.clear_errors();
            $('.auth .data > *').hide();
            $('.auth .data .recovery_form').fadeIn(300);
        },
        recovery_success() {
            this.clear_errors();
            $('.auth .data > *').hide();
            $('.auth .data .recovery_success').fadeIn(300);
        },
        login_form() {
            this.clear_errors();
            $('.auth .data > *').hide();
            $('.auth .data .login_form').fadeIn(300);
        },
        enter_register_email() {
            this.clear_errors();
            if (!isRequired(this.registration.name) || !isBetween(this.registration.name, 2, 191)) {
                this.errors.name = "Имя обязательно для ввода и должно содержать от 2 до 191 символов";
                return;
            }
            if (!isRequired(this.registration.lastname) || !isBetween(this.registration.lastname, 2, 191)) {
                this.errors.lastname = "Фамилия обязательна для ввода и должна содержать от 2 до 191 символов";
                return;
            }
            if (!isRequired(this.registration.number) || !isLengthBetween(this.registration.number, 1, 191) || !isNumber(this.registration.number)) {
                this.errors.number = "Табельный номер обязателен для ввода и должен содержать от 1 до 191 цифр";
                return;
            }
            if (!isTrue(this.registration.agree)) {
                "toast:error".exec("Необходимо дать согласие на обработку персональных данных");
                return;
            }

            if (!this.registration.email) jax.guest.registration_data(this.registration.name, this.registration.lastname, this.registration.number)
                .then(({email, has}) => {
                    if(email) {
                        this.empty_email = false;
                        this.registration.email = email;
                        this.registration.email_confirmation = email;
                    } else {
                        this.empty_email = true;
                        this.errors.email = "E-mail обязателен для ввода и должен быть корректным";
                    }
                    if (has) {
                        $('.auth .data > *').hide();
                        $('.auth .data .add_email_form').fadeIn(300);
                    } else {
                        this.empty_email = true;
                        this.errors.lastname = "Пользователь уже зарегистрирован";
                    }
                });
        },
        enter_register_password() {
            this.clear_errors();

            if (
                !isRequired(this.registration.email) ||
                !isEmail(this.registration.email) ||
                !isRequired(this.registration.email_confirmation) ||
                !isEmail(this.registration.email_confirmation)
            ) {
                this.errors.email = "E-mail обязателен для ввода и должен быть корректным";
                return ;
            }

            if (this.registration.email !== this.registration.email_confirmation) {
                this.errors.email = "E-mail должен совпадать";
                return ;
            }

            $('.auth .data > *').hide();
            $('.auth .data .add_password_form').fadeIn(300);
        },
        clear_errors() {
            Object.keys(this.errors).map((key) => this.$set(this.errors, key, null));
        },
        has_errors() {
            return Object.values(this.errors).filter((i) => !!i).length;
        },
        validPassword(password) {
            let re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/;
            return re.test(password);
        }
    }
}
</script>
