<template>
    <v-layout>
      <section class="task_info">
        <div class="cont row">
          <div class="data">
            <div class="info">
              <div>
                <div class="title">{{task.name}}</div>
                <div class="desc" v-html="task.short_description"></div>
              </div>

              <div>
                <div v-if="String(task.start_at).split('-')[1] !== String(task.finish_at).split('-')[1]" class="date">{{String(task.start_at).split('-')[2]}} {{month[String(task.start_at).split('-')[1]]}}-{{String(task.finish_at).split('-')[2]}} {{month[String(task.finish_at).split('-')[1]]}}</div>
                <div v-else-if="(String(task.start_at).split('-')[1] === String(task.finish_at).split('-')[1]) && (String(task.start_at).split('-')[2] !== String(task.finish_at).split('-')[2])" class="date">{{String(task.start_at).split('-')[2]}}-{{String(task.finish_at).split('-')[2]}} {{month[String(task.finish_at).split('-')[1]]}}</div>
                <div v-else-if="(String(task.start_at).split('-')[1] === String(task.finish_at).split('-')[1]) && (String(task.start_at).split('-')[2] === String(task.finish_at).split('-')[2])" class="date">{{String(task.finish_at).split('-')[2]}} {{month[String(task.finish_at).split('-')[1]]}}</div>

                <div v-if="between_days" class="before_start">До начала {{between_days}} {{declOfNum(between_days,['день','дня','дней'])}}</div>
                <div v-else-if="green_button" class="before_start green">Действуйте!</div>
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
                  <img :src="link(task.welcome_banner)" />
              </div>
          </div>

            <div :class="{'terms': true, 'min_w': task_report || Number(user.direction_id) !== Number(task.direction_id)}">
              <div class="title">Условия участия</div>

              <div class="desc" v-html="task.terms_of_participation"></div>
            </div>

<!--            <v-bottom-action :task="task" />-->
          <v-my-report v-if="Number(user.direction_id) !== Number(task.direction_id) || task.finished" :task="task" :reports="reports"/>
          <v-upload-fan-task_report v-else-if="!task_report && green_button && task.fans_task === true && !(task.report_type === 'quiz' || task.report_type === 'star_quiz' || task.report_type === 'download_file' || task.report_type === 'download_file_photo')" :task="task"/>
          <v-upload-image-task-report v-else-if="!task_report && task.report_type === 'image' && green_button" :task="task"/>
          <v-upload-video-task-report v-else-if="!task_report && task.report_type === 'video' && green_button" :task="task"/>
          <v-upload-text-task-report v-else-if="!task_report && task.report_type === 'text' && green_button" :task="task"/>
          <v-upload-tiv-report v-else-if="!task_report && task.report_type === 'text_or_image_or_video' && green_button" :task="task"/>
          <v-upload-image-or-video v-else-if="!task_report && task.report_type === 'image_or_video' && green_button" :task="task"/>
          <v-upload-text-or-video v-else-if="!task_report && task.report_type === 'text_or_video' && green_button" :task="task"/>
          <v-upload-text-or-image v-else-if="!task_report && task.report_type === 'text_or_image' && green_button" :task="task"/>
          <v-upload-quiz-task-report v-else-if="!task_report && task.report_type === 'quiz' && green_button" :task="task" :quiz="quiz"/>
          <v-upload-star-quiz-task-report v-else-if="!task_report && task.report_type === 'star_quiz' && green_button" :task="task" :star_quiz="star_quiz"/>
          <v-download-file-report v-else-if="!task_report && task.report_type === 'download_file' && green_button" :task="task"/>
          <v-download-file-image v-else-if="!task_report && task.report_type === 'download_file_photo' && green_button" :task="task"/>
<!--          <v-get-task-report v-else-if="task_report && task_report.status === 'uploading'"/>-->
          <v-get-task-report v-else-if="(task.report_type === 'quiz' || task.report_type === 'star_quiz' || task.report_type === 'download_file') && task_report.status === 'checked'" status="done"/>
          <v-my-report v-else-if="task_report && (task_report.status === 'uploading' || task_report.status === 'uploaded' || task_report.status === 'checked' || task_report.status === 'canceled') && task.report_type !== 'quiz'" :report="task_report" :task="task" :reports="reports"/>
          <v-upload-report-soon v-else-if="between_days" />
        </div>
      </section>
    </v-layout>
</template>

<script>

    import moment from "moment/moment";

    export default {
        $sync: ["user"],
        name: "pages_task",
        props: {
          task: {required:true},
          task_report: {required:true},
          reports: {required:true},
          quiz: {required: true},
          star_quiz: {required: true}
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
              user: {},
            };
        },
        mounted () {
          this.getBetweenDays();
          window.moment = moment;
        },
        computed: {},
        watch: {},
        methods: {

            link (link) { return window.link(link); },

          getBetweenDays() {


            let start_at = moment(this.local_task.start_at).minute(0).second(0).hour(0);
            let finish_at = moment(this.local_task.finish_at).minute(0).second(0).hour(0);
            let now = moment().minute(0).second(0).hour(0);

            if (start_at === finish_at && start_at === now) {
              this.green_button = true
            } else if (now >= start_at || finish_at <= now) {
              this.green_button = true
            } else if(finish_at > now && this.between_days === 0) {
              this.red_button = true;
            } else {
              this.between_days = moment(this.local_task.start_at).minute(0).second(0).hour(0)
                  .diff(moment().minute(0).second(0).hour(0),'days') + 1;
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
