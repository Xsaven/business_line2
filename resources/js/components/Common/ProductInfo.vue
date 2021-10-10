<template>
  <div class="info">
    <div class="name">
      {{product.name}}
    </div>

      <div v-if="Number(product.total_scrap) === 0 && product.buy" class="not_available"><br>Товар закончился</div>
      <div v-else-if="!product.today && product.buy" class="not_available"><br>Товар закончился, будет доступен завтра</div>

    <div class="color" v-if="product.today && product.all_settings.slug === 'color' && product.all_settings && product.buy && product.cost <= user.balance && product.total_scrap > 0 && product.cost > 0 && product.settings.length > 1">
      <span>цвета:</span>

      <div class="vals">
        <template v-for="(color,i) in product.settings">
            <input type="radio" v-if="Number(product.scrap[i]) !== 0"
                   :name="`product_color_${salt}`"
                   :checked="product.first_setting===color"
                   :id="`radio_color_${i}${product.id}${salt}`">
            <label :for="`radio_color_${i}${product.id}${salt}`" :style="`
                background-color: ${color};`" v-if="Number(product.scrap[i]) !== 0" @click="product.first_setting=color"
            >
            </label>
        </template>
      </div>
    </div>

    <div class="size" v-if="product.today && product.all_settings.slug === 'size' && product.all_settings && product.buy && product.cost <= user.balance && product.total_scrap > 0 && product.cost > 0 && product.settings.length > 1">
      <div class="vals">
        <template v-for="(size,i) in product.settings">
          <input
              type="radio"
              name="product2_size"
              @change="product.first_setting=size"
              :checked="product.first_setting===size"
              :id="`radio_size_${i}${product.id}${salt}`"
                 :disabled="Number(product.scrap[i]) === 0">
          <label :for="`radio_size_${i}${product.id}${salt}`">{{size}}</label>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: "v-product-info",
        $sync: ['user'],
        props: {
          product: {required: true},
          salt: {default:""}
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
