<template>
    <div class="chat">
        <div class="messages">
            <div class="message_wrap">
                <div class="message">
                    <div class="avatar">
                        <span>ЕИ</span>
                        <img data-src="/images/tmp/user_avatar3.jpg" alt="" class="lozad">
                    </div>

                    <div>
                        <div class="user_name">
                            <a href="/">Евгений Иванов</a>
                        </div>

                        <div class="text">Круто! Спасибо за участие 😀</div>
                    </div>

                    <div class="date">20.07  18:50</div>

                    <button class="reaply_btn">Ответить</button>

                    <button class="like_btn active">
                        <span>18</span>
                        <v-icon icon="ic_like" />
                        <v-icon icon="ic_like_a" />
                    </button>
                </div>
                <div class="reaply">
                    <button class="cancel_btn">
                        <v-icon icon="ic_close" />
                    </button>

                    <div class="parent_message">
                        <div class="user_name">Евгений Иванов</div>
                        <div class="text">Круто! Спасибо за участие 😀</div>
                    </div>

                    <v-home-make-commentary />
                </div>
            </div>


            <div class="message_wrap">
                <div class="message">
                    <div class="avatar">
                        <span>ЕИ</span>
                        <img data-src="/images/tmp/user_avatar3.jpg" alt="" class="lozad">
                    </div>

                    <div>
                        <div class="user_name">
                            <a href="/">Евгений Иванов</a>
                        </div>

                        <div class="text">Круто! Спасибо за участие 😀</div>
                    </div>

                    <div class="date">20.07  18:50</div>

                    <button class="reaply_btn">Ответить</button>

                    <button class="like_btn">
                        <span>18</span>
                        <v-icon icon="ic_like" />
                        <v-icon icon="ic_like_a" />
                    </button>
                </div>
                <div class="reaply">
                    <button class="cancel_btn">
                        <v-icon icon="ic_close" />
                    </button>

                    <div class="parent_message">
                        <div class="user_name">Евгений Иванов</div>
                        <div class="text">Круто! Спасибо за участие 😀</div>
                    </div>

                    <v-home-make-commentary />
                </div>
                <div class="children">
                    <div class="message_wrap">
                        <div class="message">
                            <div class="avatar">
                                <span>ЕИ</span>
                                <img data-src="/images/tmp/user_avatar3.jpg" alt="" class="lozad">
                            </div>

                            <div>
                                <div class="user_name">
                                    <a href="/">Евгений Иванов</a>
                                </div>

                                <div class="text">Круто! Спасибо за участие 😀</div>
                            </div>

                            <div class="date">20.07  18:50</div>

                            <button class="reaply_btn">Ответить</button>

                            <button class="like_btn">
                                <span>18</span>
                                <v-icon icon="ic_like" />
                                <v-icon icon="ic_like_a" />
                            </button>
                        </div>


                        <div class="reaply">
                            <button class="cancel_btn">
                                <v-icon icon="ic_close" />
                            </button>

                            <div class="parent_message">
                                <div class="user_name">Евгений Иванов</div>
                                <div class="text">Круто! Спасибо за участие 😀</div>
                            </div>

                            <v-home-make-commentary />
                        </div>
                    </div>
                </div>
            </div>


            <div class="message_wrap">
                <div class="message">
                    <div class="avatar">
                        <span>ЕИ</span>
                        <img data-src="/images/tmp/user_avatar3.jpg" alt="" class="lozad">
                    </div>

                    <div>
                        <div class="user_name">
                            <a href="/">Евгений Иванов</a>
                        </div>

                        <div class="text">Круто! Спасибо за участие 😀</div>
                    </div>

                    <div class="date">20.07  18:50</div>

                    <button class="reaply_btn">Ответить</button>

                    <button class="like_btn">
                        <span>18</span>
                        <v-icon icon="ic_like" />
                        <v-icon icon="ic_like_a" />
                    </button>
                </div>


                <div class="reaply">
                    <button class="cancel_btn">
                        <v-icon icon="ic_close" />
                    </button>

                    <div class="parent_message">
                        <div class="user_name">Евгений Иванов</div>
                        <div class="text">Круто! Спасибо за участие 😀</div>
                    </div>

                    <v-home-make-commentary />
                </div>
            </div>
        </div>


        <div class="add_message">
            <form action="">
                <textarea name="" placeholder="Написать комментарий"></textarea>

                <button type="submit" class="submit_btn">
                    <v-icon icon="ic_send" />
                </button>

                <v-home-smiles-commentary />

                <v-home-field-set-commentary />
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "v-home-commentaries",
        props: {},
        data () {
            return {

            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {}
    }
</script>
