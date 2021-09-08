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
                <div v-if="String(task.start_at).split('-')[1] !== String(task.finish_at).split('-')[1]" class="date">{{String(task.start_at).split('-')[2]}} {{month[String(task.start_at).split('-')[1]]}}-{{String(task.finish_at).split('-')[2]}} {{month[String(task.finish_at).split('-')[1]]}}</div>
                <div v-else-if="(String(task.start_at).split('-')[1] === String(task.finish_at).split('-')[1]) && (String(task.start_at).split('-')[2] !== String(task.finish_at).split('-')[2])" class="date">{{String(task.start_at).split('-')[2]}}-{{String(task.finish_at).split('-')[2]}} {{month[String(task.finish_at).split('-')[1]]}}</div>
                <div v-else-if="(String(task.start_at).split('-')[1] === String(task.finish_at).split('-')[1]) && (String(task.start_at).split('-')[2] === String(task.finish_at).split('-')[2])" class="date">{{String(task.finish_at).split('-')[2]}} {{month[String(task.finish_at).split('-')[1]]}}</div>

                <div v-if="green_button" class="before_start green">Действуй!</div>
                <div v-else-if="red_button" class="before_start red">Завершен</div>
              </div>

              <div>
                <div class="scores">{{task.cost}} {{declOfNum(task.cost,['бал','бала','баллов'])}}</div>
                <div class="members">Участники: {{task.participants}}</div>
              </div>
            </div>


            <div v-if="task.welcome_type === 'video'" class="video" >
                <v-player :video_id="task.welcome_video" />
            </div>

            <div v-else-if="task.welcome_type === 'banner'" class="video" >
              <img :src="`/${task.welcome_banner}`">
            </div>
          </div>

            <div :class="{'terms': true, 'min_w': task_report}">
              <div class="title">Условия участия</div>

              <div class="desc" v-html="task.terms_of_participation"></div>
            </div>

<!--            <v-bottom-action :task="task" />-->
          <v-upload-image-task-report v-if="!task_report && task.report_type === 'image' && green_button" :task="task"/>
          <v-upload-video-task-report v-else-if="!task_report && task.report_type === 'video' && green_button" :task="task"/>
          <v-upload-fan-task_report v-else-if="!task_report && task.report_type === 'text' && green_button && task.fans_task === true" :task="task"/>
          <v-upload-text-task-report v-else-if="!task_report && task.report_type === 'text' && green_button" :task="task"/>
          <v-upload-tiv-report v-else-if="!task_report && task.report_type === 'text_or_image_or_video' && green_button" :task="task"/>
          <v-upload-image-or-video v-else-if="!task_report && task.report_type === 'image_or_video' && green_button" :task="task"/>
          <v-upload-text-or-video v-else-if="!task_report && task.report_type === 'text_or_video' && green_button" :task="task"/>
          <v-upload-text-or-image v-else-if="!task_report && task.report_type === 'text_or_image' && green_button" :task="task"/>
          <v-upload-quiz-task-report v-else-if="!task_report && task.report_type === 'quiz' && green_button" :task="task"/>
          <v-upload-star-quiz-task-report v-else-if="!task_report && task.report_type === 'star_quiz' && green_button" :task="task"/>
          <v-download-file-report v-else-if="!task_report && task.report_type === 'download_file' && green_button" :task="task"/>
          <v-get-task-report v-else-if="task_report && task_report.status === 'created'"/>
          <v-my-report v-else-if="task_report && task_report.status === 'uploaded'" :report="task_report" :task="task" :reports="reports"/>
        </div>
      </section>
    </v-layout>
</template>

<script>

    import moment from "moment/moment";

    export default {
        name: "pages_task",
        props: {
          task: {required:true},
          task_report: {required:true},
          reports: {required:true},
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
              green_button: false,
              red_button: false,
              local_task: this.task,
            };
        },
        mounted () {
          this.getBetweenDays();
          window.moment = moment;
        },
        computed: {},
        watch: {},
        methods: {



          getBetweenDays() {
            let start_at = moment(moment(this.local_task.start_at).minute(0).second(0).hour(0)).format('MMM DD YYYY HH:mm');
            let finish_at = moment(moment(this.local_task.finish_at).minute(0).second(0).hour(0)).format('MMM DD YYYY HH:mm');
            let now = moment().minute(0).second(0).hour(0).format('MMM DD YYYY HH:mm');

            if (start_at === finish_at && finish_at === now) {
              this.green_button = true
            }
            else if(start_at <= now && finish_at >= now) {
              this.green_button = true
            }
            else if(finish_at < now) {
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
