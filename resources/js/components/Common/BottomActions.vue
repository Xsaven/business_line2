<template>
  <div class="performance">
    <div class="title">Выполнение задания</div>

    <div class="info">
      <!-- <div>Нажми, чтобы приступить к выполнению</div>
      <button class="start_btn">Старт</button> -->

      <div class="upload_report">
        <div class="title">Загрузите ваш отчет</div>

        <div class="info">
          <div class="status">
<!--            <svg class="icon yellow"><use xlink:href="images/sprite.svg#"></use></svg>-->
            <v-icon class="yellow" icon="ic_time" />
            <div>Скоро вы сможете загрузить ваш отчет</div>
          </div>

          <!-- <div class="status">
            <svg class="icon green"><use xlink:href="images/sprite.svg#ic_success"></use></svg>
            <div>Задание успешно выполнено</div>
          </div> -->

          <!-- <div class="status">
            <svg class="icon red"><use xlink:href="images/sprite.svg#ic_bad"></use></svg>
            <div>Ты не справился</div>
          </div> -->

          <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
        </div>
      </div>

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
    </div>
  </div>
</template>

<script>
export default {
  name: "v-bottom-action",
  props: ['task']
}
</script>

<style scoped>

</style>
