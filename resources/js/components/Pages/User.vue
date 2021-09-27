<template>
    <section class="lk_info">
        <div class="cont">
            <section class="user_info">
                <div class="avatar" v-html="avatar"></div>

                <div class="stats">
                    <div>Баллы: {{user.balance}}</div>
                    <div>Рейтинг: {{user.balance_rating}}</div>
                    <div>Лайки: {{user.likes}}</div>
                    <div>Рейтинг: {{user.like_rating}}</div>
                </div>

                <button class="btn subscribe_btn" v-if="user.id!==u.id && u.subscribes_users.indexOf(user.id) === -1 && u.can" @click="subscribe">
                    <v-icon icon="ic_notifications" />
                    <span>Подписаться</span>
                </button>
                <button class="btn unsubscribe_btn" v-else-if="u.can" @click="subscribe">
                    <v-icon icon="ic_notifications2" />
                    <span>Отписаться</span>
                </button>
            </section>


            <section class="user_data">
                <div class="name">{{user.full_name}}</div>
                <div class="user_name">{{user.login}}</div>

                <div class="info" v-if="user.position">
                    <div>{{user.position}}</div>
                </div>

                <div class="info" v-if="user.division">
                    <div>{{user.division}}</div>
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


                <div class="list">
                  <template v-if="Number(complete_tasks_count)" v-for="report in task_reports">
                    <v-task-report :report="report" />
                  </template>
                </div>
            </section>
            <div class="clear"></div>
        </div>
    </section>
</template>

<script>
    export default {
        $sync: {user: "u"},
        name: "pages_user",
        props: {
            user: {required: true},
            complete_tasks_count: {required: true},
            task_reports: {required:true}
        },
        data () {
            return {
                u: {}
            };
        },
        mounted () {},
        computed: {
            avatar () {
                return this.user.avatar + "<img data-src=\"/images/bg_user_avatar.svg\" alt=\"\" class=\"lozad bg\">";
            }
        },
        watch: {},
        methods: {
            link(url) {
              return url;
            },
            subscribe () {
                jax.user.subscribe(this.user.id);
            }
        }
    }
</script>
