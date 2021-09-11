<template>
  <div class="performance">
    <div class="title">Скачайте файл</div>
    <div class="info">
        <div class="quiz_start">
            <div>Нажмите, чтобы приступить к выполнению</div>
            <button type="button" @click="send" class="start_btn">Старт</button>
        </div>

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
          window.open(this.task.report_configs.download,'_blank');
          jax.user.download_file_report(this.task.id)
              .then(() => {})
      }
  }
}
</script>

<style scoped>

</style>
