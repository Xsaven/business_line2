<template>
    <v-layout>
        <section class="direction_info">
            <div class="cont row">
                <div class="data">
                    <div class="info">
                        <div>
                            <div class="title">{{direction.name}}</div>

                            <div class="desc">{{direction.description}}</div>
                        </div>

                        <div>
                            <div class="members">Участники: {{users}}</div>

                            <button  v-if="!user.subscribe_direction" class="join_btn modal_btn" data-content="#join_modal">Присоединиться</button>
                            <button disabled  v-else-if="user.direction_id === direction.id" class="join_btn modal_btn" data-content="#join_modal">Вы уже подписаны на трек</button>
                        </div>
                    </div>


                    <div :class="{video: direction.type === 'video', banner: direction.type === 'banner'}">

                        <v-player v-if="direction.type === 'video'" :video_id="direction.video" />
                        <img v-if="direction.type === 'banner'" :src="direction.banner">

                        <div class="rating">
                            <div class="stars">
                                <img src="/images/ic_star.svg" alt="">
                                <img src="/images/ic_star.svg" alt="">
                                <img src="/images/ic_star.svg" alt="">
                            </div>

                            <a :href="`/table/${direction.id}`">Рейтинг участников</a>
                        </div>
                    </div>

                    <div class="author" v-if="direction.arbitrator_name">
                        <div class="avatar">
                            <img :src="`/${direction.arbitrator_photo}`" alt="" class="lozad">
                            <img data-src="/images/bg_direction_author.svg" alt="" class="bg lozad">
                        </div>

                        <div>
                            <div class="name">{{direction.arbitrator_name}}</div>
                            <div class="post">{{direction.arbitrator_position}}</div>
                        </div>
                    </div>
                </div>


                <div class="terms">
                    <div class="title">Описания трека</div>

                    <div class="desc" v-html="direction.terms_of_participation"></div>

                    <a href="/rules" class="link" target="_blank">Правила</a>
                </div>


                <div class="prizes">
                    <div class="title">Призы</div>

                    <div class="row_wrap">
                        <div class="row">
                            <div class="item" v-for="prize in direction.prizes">
                                <div class="thumb">
                                    <img :src="`/${prize.src}`" alt="" class="lozad">
                                </div>

                                <div class="name">{{prize.name}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <v-direction-fun-callendar v-if="direction.slug === 'fun'" :tasks="tasks" />
                <v-direction-sport-callendar v-else-if="direction.slug === 'sport'" :tasks="tasks" />
                <v-direction-funs-callendar v-else-if="direction.slug === 'fans'" :tasks="tasks" />

                <v-direction-challenge-item v-if="direction.slug === 'sport'" :tasks="challenge_items" />
            </div>
        </section>

        <section v-if="!user.subscribe_direction" class="modal" id="join_modal">
            <div class="title">Внимание</div>

            <div class="desc">Вы можете выбрать только один трек. Дальнейшее изменение направления будет невозможным.</div>

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
            follow() {
                if (this.user.can) jax.user.follow_direction(this.direction.id)
                    .then(() => {
                        Fancybox.close();
                    })
            }
        }
    }
</script>
