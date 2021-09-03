<template>
    <section class="lk_info">
        <div class="cont">
            <section class="user_info">
                <div class="avatar" v-html="avatar"></div>

                <div class="stats">
                    <div>Баллы: {{user.balance}}</div>
                    <div>Лайки: {{user.likes}}</div>
                </div>

                <button class="subscribe_btn">
                    <v-icon icon="ic_notifications" />
                    <span>Подписаться</span>
                </button>
            </section>


            <section class="user_data">
                <div class="name">{{user.name}} {{user.last_name}}</div>
                <div class="user_name">{{user.login}}</div>

                <div class="info" v-if="user.position">
                    <div>{{user.position}}</div>
                </div>

                <div class="desc">
                    <div class="title">О себе:</div>

                    <div>{{user.about}}</div>
                </div>

                <div class="direction" v-if="user.follow_direction">
                    Направление участия: <a :href="`/direction/${user.follow_direction.slug}`">{{user.follow_direction.name}}</a>
                </div>
            </section>

            <section class="tasks_list">
                <div class="title">Выполненные задания ({{complete_tasks_count}})</div>

                <div class="list" v-if="Number(complete_tasks_count)">
                    <div class="task_wrap">
                        <div class="task">
                            <div class="head">
                                <div class="title">
                                    <a href="/">Отжаться 10 раз за 10 секунд</a>
                                </div>

                                <div class="date">20 августа 18:15</div>
                            </div>

                            <div class="author">
                                <div class="avatar">
                                    <img data-src="/images/tmp/user_avatar3.jpg" alt="" class="lozad">
                                </div>

                                <div>
                                    <div class="name">Евгений Иванов</div>
                                    <div class="text">Круто! Спасибо за участие 😀</div>
                                </div>
                            </div>

                            <div class="video">
                                <img data-src="/images/tmp/video_thumb.jpg" alt="" class="lozad">
                                <svg class="icon"><use xlink:href="/images/sprite.svg#ic_video_play"></use></svg>
                            </div>

                            <div class="bottom">
                                <button class="like_btn active">
                                    <span>18</span>
                                    <svg class="icon"><use xlink:href="/images/sprite.svg#ic_like"></use></svg>
                                    <svg class="icon"><use xlink:href="/images/sprite.svg#ic_like_a"></use></svg>
                                </button>
                            </div>
                        </div>


                        <div class="dialog">
                            <div class="messages">
                                <div class="message">
                                    <div class="user">
                                        <div class="avatar">
                                            <span>АВ</span>
                                            <img data-src="/images/tmp/user_avatar.jpg" alt="" class="lozad">
                                        </div>

                                        <div>
                                            <div class="name">
                                                <a href="/">Алена Васильева</a>
                                            </div>
                                            <div class="date">21 августа 18:47</div>
                                        </div>
                                    </div>

                                    <div class="text">
                                        <img src="/images/tmp/dialog_img.jpg" alt="">
                                    </div>
                                </div>

                                <div class="message">
                                    <div class="user">
                                        <div class="avatar">
                                            <span>АН</span>
                                        </div>

                                        <div>
                                            <div class="name">
                                                <a href="/">Алексей Николае...</a>
                                            </div>
                                            <div class="date">21 августа 18:47</div>
                                        </div>
                                    </div>

                                    <div class="text">
                                        😀
                                    </div>
                                </div>
                            </div>

                            <div class="add_message">
                                <v-home-smiles-commentary />
                            </div>
                        </div>
                    </div>

                    <div class="task">
                        <div class="head">
                            <div class="title">
                                <a href="/">Отжаться 10 раз за 10 секунд</a>
                            </div>

                            <div class="date">20 августа 18:15</div>
                        </div>

                        <div class="author">
                            <div class="avatar">
                                <img data-src="/images/tmp/user_avatar3.jpg" alt="" class="lozad">
                            </div>

                            <div>
                                <div class="name">Евгений Иванов</div>
                                <div class="text">Круто! Спасибо за участие 😀</div>
                            </div>
                        </div>

                        <div class="video">
                            <img data-src="/images/tmp/video_thumb.jpg" alt="" class="lozad">
                            <svg class="icon"><use xlink:href="/images/sprite.svg#ic_video_play"></use></svg>
                        </div>

                        <div class="bottom">
                            <button class="like_btn">
                                <span>18</span>
                                <svg class="icon"><use xlink:href="/images/sprite.svg#ic_like"></use></svg>
                                <svg class="icon"><use xlink:href="/images/sprite.svg#ic_like_a"></use></svg>
                            </button>

                            <v-home-smiles-commentary />
                        </div>
                    </div>


                    <div class="task">
                        <div class="head">
                            <div class="title">
                                <a href="/">Отжаться 10 раз за 10 секунд</a>
                            </div>

                            <div class="date">20 августа 18:15</div>
                        </div>

                        <div class="author">
                            <div class="avatar">
                                <img data-src="/images/tmp/user_avatar3.jpg" alt="" class="lozad">
                            </div>

                            <div>
                                <div class="name">Евгений Иванов</div>
                                <div class="text">Круто! Спасибо за участие 😀</div>
                            </div>
                        </div>

                        <div class="desc">Текстовый отчет Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>

                        <div class="bottom">
                            <button class="like_btn">
                                <span>18</span>
                                <svg class="icon"><use xlink:href="/images/sprite.svg#ic_like"></use></svg>
                                <svg class="icon"><use xlink:href="/images/sprite.svg#ic_like_a"></use></svg>
                            </button>

                            <v-home-smiles-commentary />
                        </div>
                    </div>
                </div>
            </section>
            <div class="clear"></div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "pages_user",
        props: {
            user: {required: true},
            complete_tasks_count: {required: true},
        },
        data () {
            return {

            };
        },
        mounted () {},
        computed: {
            avatar () {
                return this.user.avatar + "<img data-src=\"/images/bg_user_avatar.svg\" alt=\"\" class=\"lozad bg\">";
            }
        },
        watch: {},
        methods: {}
    }
</script>
