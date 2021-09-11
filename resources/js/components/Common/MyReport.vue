<template>
  <div class="reports">
    <div class="my_report">
      <div class="title">Мой отчет</div>
        <div class="upload_report" style="margin-left: 0;" v-if="report.status === 'uploaded' || report.status === 'uploading'">
            <div class="info">
                <div class="status">
                    <v-icon icon="ic_time" class="yellow" />
                    <div>Ваш отчет на проверке</div>
                </div>
                <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
            </div>
        </div>
      <div v-else class="tasks_list">
        <div class="list">
            <v-task-report :report="report" />
        </div>
      </div>
    </div>


    <div class="head">
      <div class="title">Отчеты участников ({{r.length}})</div>
<!--        <div class="sort">-->
<!--            <div class="name">Сортировать:</div>-->

<!--            <v-select name="">-->
<!--                <option value="1" selected>По дате публикации</option>-->
<!--                <option value="2">По лайкам</option>-->
<!--            </v-select>-->
<!--        </div>-->
    </div>

    <div class="empty" v-if="!r.length">Здесь скоро появятся отчёты других участников</div>
      <div class="tasks_list">
          <div class="list">
              <template v-for="r_report in r">
                  <v-task-report :report="r_report" />
              </template>
          </div>
      </div>
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
      r: this.reports,
    }
  }

}
</script>

<style scoped>

</style>
