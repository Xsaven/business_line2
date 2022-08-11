<template>
    <v-layout>
        <section class="direction_info">
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

        <section v-if="!user.subscribe_direction && user.can" class="modal" id="join_modal">
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
    </v-layout>
</template>

<script>
    export default {
        name: "pages_direction",
        $sync: ['user'],
        props: {
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
