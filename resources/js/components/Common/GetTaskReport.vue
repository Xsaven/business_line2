<template>
  <div class="upload_report">
    <div class="title">Мой отчет</div>

    <div class="info">
      <div v-if="status === 'upload'" class="status">
        <v-icon icon="ic_time" class="yellow" />
        <div>Скоро ты сможешь загрузить свой отчет</div>
      </div>

      <div v-if="status === 'success'" class="status">
        <v-icon icon="ic_success" class="green" />
        <div>Ваш отчет успешно отправлен</div>
      </div>

      <div v-if="status === 'done'" class="status">
        <v-icon icon="ic_success" class="green" />
        <div>Вы успешно выполнили задание</div>
      </div>

      <div v-if="status === 'error'" class="status">
        <v-icon icon="ic_bad" class="red" />
        <div>Ты не справился</div>
      </div>

      <div v-if="status === 'no'" class="status">
          <v-icon icon="ic_success" class="green" />
        <div>В этом задании нет отчетов</div>
      </div>

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
    </div>
  </div>
</template>

<script>
export default {
  name: "v-get-task-report",
  props: {
      status: {default: "success"}
  }
}
</script>

<style scoped>

</style>
