<template>
    <section class="lk_data">
        <div class="history">
            <div class="block_head">
                <div class="title">История</div>
            </div>

            <div v-if="has" class="list">
                <div class="item">
                    <div class="date color1"><span>1</span> октября</div>

                    <div class="name">
                        <a href="/">10 000 шагов челлендж. Пришли селфи с шагомеро...</a>
                    </div>

                    <div class="scores">17 баллов</div>

                    <button class="flag_btn">
                        <v-icon icon="ic_flag" />
                    </button>
                </div>

                <div class="item">
                    <div class="date color2"><span>31</span> сентября</div>

                    <div class="name">
                        <a href="/">Попади в мусорную корзину / урну мячиком, сделан...</a>
                    </div>

                    <div class="scores">9 баллов</div>

                    <button class="flag_btn">
                        <v-icon icon="ic_flag" />
                    </button>
                </div>

                <div class="item">
                    <div class="date color3"><span>31</span> сентября</div>

                    <div class="name">
                        <a href="/">Сложи пять олимпийских колец из подручных средст...</a>
                    </div>

                    <div class="scores">12 баллов</div>

                    <button class="flag_btn">
                        <v-icon icon="ic_flag" />
                    </button>
                </div>

                <div class="item">
                    <div class="date color1"><span>1</span> октября</div>

                    <div class="name">
                        <a href="/">10 000 шагов челлендж. Пришли селфи с шагомеро...</a>
                    </div>

                    <div class="scores">17 баллов</div>

                    <button class="flag_btn">
                        <v-icon icon="ic_flag" />
                    </button>
                </div>

                <div class="item">
                    <div class="date color2"><span>31</span> сентября</div>

                    <div class="name">
                        <a href="/">Попади в мусорную корзину / урну мячиком, сделан...</a>
                    </div>

                    <div class="scores">9 баллов</div>

                    <button class="flag_btn">
                        <v-icon icon="ic_flag" />
                    </button>
                </div>

                <div class="item">
                    <div class="date color3"><span>31</span> сентября</div>

                    <div class="name">
                        <a href="/">Сложи пять олимпийских колец из подручных средст...</a>
                    </div>

                    <div class="scores">12 баллов</div>

                    <button class="flag_btn">
                        <v-icon icon="ic_flag" />
                    </button>
                </div>

                <div class="item">
                    <div class="date color3"><span>31</span> сентября</div>

                    <div class="name">
                        <a href="/">Сложи пять олимпийских колец из подручных средст...</a>
                    </div>

                    <div class="scores">12 баллов</div>

                    <button class="flag_btn">
                        <v-icon icon="ic_flag" />
                    </button>
                </div>
            </div>
            <div v-else class="empty">Здесь еще ничего нет :(</div>
        </div>
    </section>
</template>

<script>
    export default {
        $sync: ['user'],
        name: "v-profile-personal-history",
        props: {},
        data () {
            return {
                user: {},
                has: 0
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {}
    }
</script>
