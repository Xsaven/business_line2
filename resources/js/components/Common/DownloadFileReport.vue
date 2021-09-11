<template>
  <div class="upload_report">
    <div class="title">Скачай файл</div>
    <div class="info">
      <form class="form">

          <a :href="task.report_configs.download" @click="send" target="_blank" class="download_link" style="color: #fab509;">
              <v-icon icon="ic_file" />
              <span>Скачать файл</span>
          </a>

      </form>

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
    </div>
  </div>
</template>

<script>
export default {
  name: "v-download-file-report",
  props: ['task'],
  methods: {
      send() {
          jax.user.download_file_report(this.task.id)
              .then(() => {})
      }
  }
}
</script>

<style scoped>

</style>
