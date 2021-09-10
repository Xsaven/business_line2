<template>
    <section class="search_result">
        <div class="cont">
            <div class="block_head center">
                <div class="title">Результаты поиска по запросу {{ljs.help.query_get('q')}}</div>
            </div>

            <div class="result">
                <div class="section">
                    <div class="title">Люди: {{users.length}}</div>

                    <div class="persons">
                        <template v-for="(user, ui) in users">
                            <div class="item" :key="`user_${ui}`">
                                <div class="avatar" v-html="user.avatar"></div>

                                <div>
                                    <div class="name">
                                        <a :href="`/user/${user.id}`">{{user.full_name}}</a>
                                    </div>

                                    <div v-if="user.position" class="post">{{user.position}}</div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="section">
                    <div class="title">Задания: {{tasks.length}}</div>

                    <template v-for="(task, ti) in tasks">
                        <div class="tasks" :key="`task_${ti}`">
                            <div class="item">
                                <div class="name">
                                    <a :href="`/task/${task.id}`">{{task.name}}</a>
                                </div>

                                <div class="desc" v-html="task.short_description"></div>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="section">
                    <div class="title">Отчеты участников: {{reports.length}}</div>

                    <div class="reports">
                        <template v-for="(report, ri) in reports">
                            <div class="item" :key="`task_${ri}`">
                                <div class="avatar" v-html="report.user.avatar"></div>

                                <div>
                                    <div class="name">
                                        <a :href="`/user/${report.user.id}`">{{report.user.full_name}}</a>
                                    </div>

                                    <div class="report">
                                        <a :href="`/task/${report.task.id}`">{{report.task.name}}</a>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "pages_search",
        props: {
            users: {required: true},
            tasks: {required: true},
            reports: {required: true},
        },
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
