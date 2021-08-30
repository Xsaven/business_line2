<template>
    <v-layout>
      <section class="task_info">
        <div class="cont row">
          <div class="data">
            <div class="info">
              <div>
                <div class="title">{{task.name}}</div>
                <div class="desc">{{task.short_description}}</div>
              </div>

              <div>
                <div class="date">{{String(task.start_at).split('-')[2]}}-{{String(task.finish_at).split('-')[2]}} {{month[String(task.finish_at).split('-')[1]]}}</div>
                <div v-if="between_days" class="before_start">До начала {{between_days}} {{declOfNum(between_days,['день','дня','дней'])}}</div>
                <div v-else-if="green_button" class="before_start green">Действуй!</div>
                <div v-else-if="red_button" class="before_start red">Завершен</div>
              </div>

              <div>
                <div class="scores">{{task.cost}} {{declOfNum(task.cost,['бал','бала','балов'])}}</div>
                <div class="members">Участники: 152</div>
              </div>
            </div>


            <div class="video">

            </div>
          </div>

            <div class="terms">
              <div class="title">Условия участия</div>

              <div class="desc" v-html="task.terms_of_participation"></div>
            </div>

<!--            <v-bottom-action :task="task" />-->
<!--          <v-upload-task-status />-->
          <v-upload-task-report />
        </div>
      </section>
    </v-layout>
</template>

<script>

    import moment from "moment/moment";

    export default {
        name: "pages_task",
        props: {
          task: {required:true}
        },
        data () {
            return {
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
              between_days: '',
              green_button: false,
              red_button: false,
              local_task: this.task,
            };
        },
        mounted () {
          this.getBetweenDays();
        },
        computed: {},
        watch: {},
        methods: {
          getBetweenDays() {
            this.between_days = moment(this.local_task.start_at).minute(0).second(0).hour(0).diff(moment().minute(0).second(0).hour(0),'days') + 1;

            if((Number((this.local_task.start_at).split('-')[2]) <= Number(moment().format('DD'))) &&
                (Number((this.local_task.finish_at).split('-')[2]) > Number(moment().format('DD')))) {
              this.between_days = '';
              this.green_button = true;
            }

            if(Number((this.local_task.finish_at).split('-')[2]) <= Number(moment().format('DD'))) {
              this.between_days = '';
              this.red_button = true;
            }

          },
          declOfNum(n, text_forms) {
            n = Math.abs(n) % 100;
            var n1 = n % 10;
            if (n > 10 && n < 20) { return text_forms[2]; }
            if (n1 > 1 && n1 < 5) { return text_forms[1]; }
            if (n1 === 1) { return text_forms[0]; }
            return text_forms[2];
          }
        }
    }
</script>
