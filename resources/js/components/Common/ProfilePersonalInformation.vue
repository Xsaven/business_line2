<template>
    <section class="lk_data">

        <div class="personal">
            <div class="user_data">
                <div class="name">
                    <span>Евгений<br> Иванов</span>
                    <button class="edit_btn">
                        <v-icon icon="ic_edit" />
                    </button>
                </div>

                <div class="user_name">e_ivanov</div>

                <div class="info">
                    <div>Водитель-экспедитор категории «Е»</div>
                    <div>Нижний Новгород 2 ТК</div>
                </div>

                <div class="desc">
                    <div class="title">О себе:</div>

                    <div>Являясь всего лишь частью общей картины, ключевые особенности структуры проекта преданы социально-демократической анафеме.</div>
                </div>

                <div class="direction">
                    Направление участия: <a href="/">Sport</a>
                </div>
            </div>


            <form action="" class="form edit_form">
                <div class="name">Евгений Иванов</div>

                <div class="line">
                    <div class="field">
                        <input type="text" name="" value="" class="input" placeholder="Задать свой Ник">
                    </div>
                </div>

                <div class="line">
                    <div class="field">
                        <select name="">
                            <option value="0" data-display="Должность"></option>
                            <option value="1">Вариант 1</option>
                            <option value="2">Вариант 2</option>
                            <option value="3">Вариант 3</option>
                        </select>
                    </div>
                </div>

                <div class="line">
                    <div class="field">
                        <select name="">
                            <option value="0" data-display="Подразделение"></option>
                            <option value="1">Вариант 1</option>
                            <option value="2">Вариант 2</option>
                            <option value="3">Вариант 3</option>
                        </select>
                    </div>
                </div>

                <div class="line">
                    <div class="field">
                        <textarea name="" placeholder="О себе"></textarea>
                    </div>
                </div>

                <div class="submit">
                    <button type="submit" class="submit_btn">Сохранить</button>
                    <button type="button" class="cancel_btn">Отмена</button>
                </div>
            </form>


            <div class="avatar">
                <div class="img" v-html="avatar"></div>

                <div class="upload">
                    <input type="file" name="avatar" id="avatar">
                    <label for="avatar">Загрузить фото</label>
                </div>
            </div>
        </div>

        <div class="tasks_list">
            <div class="title">Выполненные задания ({{user.complete_tasks_count}})</div>

            <div class="list" v-if="Number(user.complete_tasks_count)">

            </div>
        </div>
    </section>
</template>

<script>
    export default {
        $sync: ['user'],
        name: "v-profile-personal-information",
        props: {},
        data () {
            return {
                user: {}
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
