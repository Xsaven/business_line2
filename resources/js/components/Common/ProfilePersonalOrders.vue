<template>
    <section class="lk_data">
        <div class="orders">
            <div class="block_head">
                <div class="title">Мои заказы</div>
            </div>

            <div v-if="has" class="row">
                <div class="order">
                    <div class="head">
                        <div class="date">18.08.2021</div>

                        <div class="status decorated">Оформлен</div>
                    </div>

                    <div class="product">
                        <div class="thumb">
                            <img data-src="images/tmp/product_thumb.png" alt="" class="lozad">
                        </div>

                        <div>
                            <div class="name">Кружка 20 лет в отрыв</div>
                            <div class="color">цвет: черный</div>
                            <div class="scores">200 баллов</div>
                        </div>
                    </div>

                    <div class="contacts">
                        <div class="phone">+ 7 999 999 99 99</div>
                        <div class="email">email@mail.ru</div>
                        <div class="address">г. Москва, Новодмитриевское шосс, д18, к3</div>
                    </div>
                </div>


                <div class="order">
                    <div class="head">
                        <div class="date">18.08.2021</div>

                        <div class="status on_my_way">В пути</div>
                    </div>

                    <div class="product">
                        <div class="thumb">
                            <img data-src="images/tmp/product_thumb2.png" alt="" class="lozad">
                        </div>

                        <div>
                            <div class="name">Футболка-поло мужская «20 лет в отрыв!»</div>
                            <div class="size">размер: S</div>
                        </div>
                    </div>

                    <div class="contacts">
                        <div class="phone">+ 7 999 999 99 99</div>
                        <div class="email">email@mail.ru</div>
                        <div class="address">г. Москва, Новодмитриевское шосс, д18, к3</div>
                    </div>
                </div>


                <div class="order">
                    <div class="head">
                        <div class="date">18.08.2021</div>

                        <div class="status success">Доставлен</div>
                    </div>

                    <div class="product">
                        <div class="thumb">
                            <img data-src="images/tmp/product_thumb3.png" alt="" class="lozad">
                        </div>

                        <div>
                            <div class="name">Футболка-поло мужская «20 лет в отрыв!»</div>
                            <div class="size">размер: S</div>
                        </div>
                    </div>

                    <div class="contacts">
                        <div class="phone">+ 7 999 999 99 99</div>
                        <div class="email">email@mail.ru</div>
                        <div class="address">г. Москва, Новодмитриевское шосс, д18, к3</div>
                    </div>
                </div>
            </div>
            <div v-else class="empty">Здесь еще ничего нет :(</div>
        </div>
    </section>
</template>

<script>
    export default {
        $sync: ['user'],
        name: "v-profile-personal-orders",
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
