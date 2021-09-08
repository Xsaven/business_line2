<template>
  <div class="reports">
    <div class="my_report">
      <div class="title">Мой отчет</div>

      <div class="tasks_list">
        <div class="list">
            <v-task-report :task="task" />
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
  props: ['report','task', 'reports'],
  data() {
    return {
      user: {},
      month: {
        '01': 'января',
        '02': 'февраля',
        '03': 'марта',
        '04': 'апреля',
        '05': 'мая',
        '06': 'июня',
        '07': 'июля',
        '08': 'августа',
        '09': 'сентября',
        '10': 'октября',
        '11': 'ноября',
        '12': 'декабря',
      },
    }
  }

}
</script>

<style scoped>

</style>
