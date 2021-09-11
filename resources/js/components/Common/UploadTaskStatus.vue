<template>
  <div class="upload_report">
    <div class="title">Загрузите ваш отчет </div>

    <div class="info">
      <div class="status">
<!--        <v-icon icon="ic_time" class="yellow" />-->
<!--        <div>Скоро ты сможешь загрузить свой отчет</div>-->
<!--      </div>-->

      <!-- <div class="status">
        <v-icon icon="ic_success" class="green" />
        <div>Задание успешно выполнено</div>
      </div> -->

      <div class="status">
        <v-icon icon="ic_bad" class="red" />
        <div>Ты не справился</div>
      </div>

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad loaded" src="/images/bg_performance.svg" data-loaded="true">
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: "v-upload-task-status",
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
