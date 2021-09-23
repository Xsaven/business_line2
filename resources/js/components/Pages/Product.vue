<template>
  <v-layout>
    <section class="shop">
      <div class="cont">
        <div class="block_head">
          <div class="title">Магазин подарков</div>

          <div class="scores">Доступно: {{ user.balance }} {{ declOfNum(user.balance, ['бал', 'бала', 'баллов']) }}
          </div>
        </div>

        <div class="products">
          <div class="row">
            <div class="product" v-for="(product, product_index) in prods">
              <div v-if="product.cost > 0 && product.buy" :class="{'scores': true,'red': product.cost > user.balance }">
                {{ product.cost }} {{ declOfNum(product.cost, ['бал', 'бала', 'баллов']) }}
              </div>
              <div v-else-if="product.cost > 0 && !product.buy" :class="{'scores': true }">{{ product.cost }}
                {{ declOfNum(product.cost, ['бал', 'бала', 'баллов']) }}
              </div>

              <div class="thumb">
                <img :src="product.src" alt="" class="lozad">
              </div>

              <v-product-info :product="product"/>

              <div v-if="user.balance < product.cost && product.cost > 0 && product.buy" class="not_available">Для
                покупки тебе не хватает баллов :(
              </div>

              <button v-else-if="user.balance >= product.cost && product.cost > 0 && product.buy"
                      class="buy_btn modal_btn" data-content="#buy_modal" @click="selected=product_index">Купить
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="modal" id="buy_modal">
      <div class="row">
        <div class="product">
          <div class="thumb">
            <img :src="prods[selected].src" alt="" class="lozad">
          </div>

          <v-product-info v-if="prods[selected].id" :product="prods[selected]" salt="modal"/>
        </div>

        <form action="" class="form">
          <div class="title">Оформление заказа</div>

          <div class="columns row">
            <div class="line">
              <div class="field">
                <input v-model="phone"
                       v-input-mask mask="+7 (999) 999-99-99"
                       type="tel" ref="phone" class="input" placeholder="Номер телефона">
              </div>
            </div>

            <div class="line">
              <div class="field">
                <input v-model="email" type="email" class="input" placeholder="Электронная почта">
              </div>
            </div>
          </div>

          <div class="line">
            <div class="field">
<!--              <v-select v-model="select_address">-->
<!--                <option value="0" data-display="Адрес ОСП для доставки"></option>-->
<!--                <option v-for="address in deliveries" :value="address.id">{{ address.address }}</option>-->
<!--              </v-select>-->
              <v-select-autocomplite v-model="select_address" handle="user.deliveries" placeholder="Адрес ОСП для доставки" />
            </div>
          </div>

          <div class="submit">
            <button @click.prevent.stop="buy_product()" type="submit" class="submit_btn">Оформить заказ</button>
          </div>
          <br/>
          <label
              v-if="error === true"
              class="error input-wrap_error" style="color: rgb(255 124 99); box-shadow: none">Необходимо заполнить все
            поля!</label>
        </form>
      </div>
    </section>
  </v-layout>
</template>

<script>
export default {
  name: "pages_product",
  $sync: ['user'],
  $remember: ['phone', 'email', 'select_address'],
  props: {
    products: {required: true},
    deliveries: {required: true}
  },
  data() {
    return {
      user: {},
      selected: 0,
      prods: this.products,
      phone: '',
      email: '',
      select_address: '',
      error: false,
    };
  },
  mounted() {
    this.$refs.phone.addEventListener('keyup', this.setPhone.bind(this))
  },
  beforeDestroy() {
    this.$refs.phone.removeEventListener('keyup', this.setPhone.bind(this));
  },
  computed: {},
  watch: {},
  methods: {
    setPhone() {
      this.phone = this.$refs.phone.value;
    },
    declOfNum(n, text_forms) {
      n = Math.abs(n) % 100;
      var n1 = n % 10;
      if (n > 10 && n < 20) {
        return text_forms[2];
      }
      if (n1 > 1 && n1 < 5) {
        return text_forms[1];
      }
      if (n1 === 1) {
        return text_forms[0];
      }
      return text_forms[2];
    },
    buy_product() {
      if (!this.phone || !this.email || !this.select_address) {
        this.error = true
      } else {
        jax.user.create_order(
            this.phone,
            this.email,
            this.select_address,
            this.products[this.selected].id
        )
            .then(() => {
              Fancybox.close();
              return "toast::success".exec("Заказ оформлен!");
            })
      }
    },
  }
}
</script>
