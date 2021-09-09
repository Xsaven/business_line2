<template>
  <div class="upload_report">
    <div class="title">Отчёт</div>

    <div class="info">
      <!-- <div class="status">
        <svg class="icon yellow"><use xlink:href="images/sprite.svg#ic_time"></use></svg>
        <div>Скоро ты сможешь загрузить свой отчет</div>
      </div> -->

      <div class="status">
        <v-icon icon="ic_success" class="green" />
        <div>Ваш отчет успешно отправлен</div>
      </div>

      <!-- <div class="status">
        <svg class="icon red"><use xlink:href="images/sprite.svg#ic_bad"></use></svg>
        <div>Ты не справился</div>
      </div> -->

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
    </div>
  </div>
</template>

<script>
export default {
  name: "v-get-task-report"
}
</script>

<style scoped>

</style>
