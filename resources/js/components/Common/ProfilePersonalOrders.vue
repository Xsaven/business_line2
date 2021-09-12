<template>
    <section class="lk_data">
        <div class="orders">
            <div class="block_head">
                <div class="title">Мои заказы</div>
            </div>

            <div class="row" v-if="orders.length">
              <template v-for="order in orders" >
              <div class="order">
                    <div class="head">
                        <div class="date">{{order.created_at}}</div>

                        <div v-if="order.status === 'created'" class="status decorated">Создан</div>
                        <div v-else-if="order.status === 'approved'" class="status decorated">Оформлен</div>
                        <div v-else-if="order.status === 'transit'" class="status on_my_way">В пути</div>
                        <div v-else-if="order.status === 'success'" class="status success"> Доставлен</div>
                    </div>

                    <div class="product">
                        <div class="thumb">
                            <img :src="link(order.product[0].src)" alt="" class="lozad">
                        </div>

                        <div>
                            <div class="name">{{order.product[0].name}}</div>
<!--                            <div class="color">цвет: черный</div>-->
                            <div class="scores">{{order.product[0].cost}} {{declOfNum(order.product[0].cost,['бал','бала','баллов'])}}</div>
                        </div>
                    </div>

                    <div class="contacts">
                        <div class="phone">{{order.phone}}</div>
                        <div class="email">{{order.email}}</div>
                        <div class="address">{{order.delivery}}</div>
                    </div>
                </div>
              </template>
            </div>
            <div v-else class="empty">Здесь еще ничего нет :(</div>
        </div>
    </section>
</template>

<script>
    export default {
        $sync: ['user'],
        name: "v-profile-personal-orders",
        props: ['orders'],
        data () {
            return {
                user: {},
                has: 0
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
          declOfNum(n, text_forms) {
            n = Math.abs(n) % 100;
            var n1 = n % 10;
            if (n > 10 && n < 20) { return text_forms[2]; }
            if (n1 > 1 && n1 < 5) { return text_forms[1]; }
            if (n1 === 1) { return text_forms[0]; }
            return text_forms[2];
          },
          link(url) {
            return url;
          }
        }
    }
</script>
