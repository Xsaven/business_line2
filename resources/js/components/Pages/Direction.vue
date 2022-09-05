<template>
    <v-layout>
        <section v-if="! banner" class="direction_info">
            <div class="cont row">
                <div class="data">
                    <div class="info">
                        <div>
                            <div class="title">{{direction.name}}</div>

                            <div class="desc text_block" v-html="direction.description_inside"></div>
                        </div>
                        <div></div>
                    </div>


                    <div :class="{video: direction.type === 'video', banner: direction.type === 'banner'}">

                        <v-player v-if="direction.type === 'video'" :video_id="direction.video" />
                        <img v-if="direction.type === 'banner'" :src="direction.banner">

                    </div>
                </div>


                <div class="terms">
                    <div class="title">Условия участия</div>

                    <div class="desc" v-html="direction.terms_of_participation"></div>

                    <a href="/rules" class="link" target="_blank">Смотреть правила</a>
                </div>

                <v-direction-fun-callendar v-if="direction.slug === 'home'" :tasks="tasks" />

            </div>
        </section>
        <section v-if="! banner && !user.subscribe_direction && user.can" class="modal" id="join_modal">
            <div class="title">Внимание</div>

          <div class="desc">Вы можете выбрать <b>только один трек.</b> Дальнейшее изменение направления будет невозможным.</div>

            <form action="" class="form">
                <div class="field">
                    <input v-model="first_checkbox" type="checkbox" name="agree" id="agree_check1" :class="{'error': !first_checkbox}" checked>
                    <label for="agree_check1">Я ознакомлен с правилами и принимаю условия</label>
                </div>

                <div class="field">
                    <input v-model="second_checkbox" type="checkbox" name="agree" id="agree_check2" :class="{'error': !second_checkbox}">
                    <label for="agree_check2">Я ознакомлен с информацией о том, что выбрать трек для участия можно только один раз</label>
                </div>
                <div class="submit">
                    <button  @click.prevent.stop="follow()" :disabled="!(first_checkbox && second_checkbox)" class="submit_btn">Присоединиться</button>
                </div>
            </form>
        </section>
        <section v-if="banner" class="banner-content">
            <div class="cont row">
                <div class="banner-content__inner">
                    <div class="banner-content__row">
                        <h2 class="banner-content__title">Поздравляем!</h2>
                    </div>
                    <div class="banner-content__row">
                        <div class="banner-content__left">
                            <h3 class="banner-content__subtitle">Отборочный этап марафона «Деловые и спортивные» завершен!</h3>
                            <h4 class="banner-content__subtitle2">Большое спасибо всем за участие: вы молодцы!</h4>
                            <p class="banner-content__desc">Теперь финалисты мероприятия с 16 по 18 сентября <br> отправятся в Москву
                                на соревнования, чтобы лицом <br> к
                                лицу
                                встретиться в борьбе за первое место!</p>
                        </div>
                        <div class="banner-content__right">
                            <h2 class="banner-content__title2">Они встретятся друг с другом лично <span> с 16 по 18 сентября!</span>
                            </h2>
                            <p class="banner-content__desc">И, конечно, имена тех, кто окажется лучшим в финале, мы объявим в
                                нашем дайджесте «В курсе <br> дела» после
                                подведения итогов.
                                <br>
                                Следите за новостями!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </v-layout>
</template>

<script>
    export default {
        name: "pages_direction",
        $sync: ['user'],
        props: {
            banner: {required:true},
            direction: {required:true},
            dates: {required:true},
            users: {required:true},
            tasks: {required:true},
        },
        data () {
            return {
                first_checkbox: false,
                second_checkbox: false,
                user: {},
                month: {
                  '01': 'Января',
                  '02': 'Февраля',
                  '03': 'Марта',
                  '04': 'Апреля',
                  '05': 'Мая',
                  '06': 'Июня',
                  '07': 'Июля',
                  '08': 'Августа',
                  '09': 'Сентября',
                  '10': 'Октября',
                  '11': 'Ноября',
                  '12': 'Декабря',
                }
            };
        },
        mounted () {},
        computed: {
            challenge_items () {
                if (this.direction.slug === 'fun') {
                    return [
                        this.tasks[8],
                        this.tasks[17],
                        this.tasks[25],
                        this.tasks[33],
                    ]
                } else if (this.direction.slug === 'sport') {
                    return [
                        this.tasks[41],
                        this.tasks[50],
                        this.tasks[58],
                        this.tasks[66],
                    ]
                }
                return [];
            }
        },
        watch: {},
        methods: {
            link (link) { return window.link(link); },
            follow() {
                if (this.user.can) jax.user.follow_direction(this.direction.id)
                    .then(() => {
                        Fancybox.close();
                    })
            }
        }
    }
</script>
