<template>
  <div class="upload_report">
    <div class="title">Загрузите ваш отчёт</div>

    <div class="info">
      <div class="status">
        <v-icon icon="ic_time" class="yellow" />
        <div>Скоро вы сможете загрузить ваш отчёт</div>
      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad loaded" src="/images/bg_performance.svg" data-loaded="true">
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: "v-upload-report-soon",
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
