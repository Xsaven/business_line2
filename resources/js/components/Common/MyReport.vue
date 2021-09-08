<template>
  <div class="reports">
    <div class="my_report">
      <div class="title">Мой отчет</div>

      <div class="tasks_list">
        <div class="list">
            <v-task-report :report="report" />
        </div>
      </div>
    </div>


    <div class="head">
      <div class="title">Отчеты участников (0)</div>
    </div>

    <div class="empty">Здесь скоро появятся отчёты других участников</div>
  </div>
</template>

<script>
export default {
  $sync: ['user'],
  name: "v-my-report",
  props: ['report','task','reports'],
  data() {
    return {
      user: {},
    }
  }

}
</script>

<style scoped>

</style>
