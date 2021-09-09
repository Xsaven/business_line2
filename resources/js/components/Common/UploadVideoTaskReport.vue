<template>
  <div class="upload_report">
  <div class="title">Загрузите ваш отчёт </div>

  <div class="info">
    <form class="form" @submit.stop.prevent="send">

      <div class="line files">
        <div class="choose field" v-if="!file">
          <input type="file" name="file" id="file" ref="file" @change="handleUpload" accept="image/jpeg, image/png">
          <label for="file">
            <v-icon icon="ic_attachment" />
            <span>Прикрепить видео</span>
            <div class="rules">mov, mp4, mpeg, mpg до 20 МБ</div>
          </label>
        </div>

        <div class="loading" v-else style="display: block">
          <div class="row">
            <div class="icon">
              <svg><use xlink:href="/images/sprite.svg#ic_file2"></use></svg>
            </div>

            <div>
              <div class="name">{{file.name}}</div>

              <div class="progress">
                <div class="bar" :style="`width: ${loading}%;`"></div>
              </div>

              <div class="size">
                <span class="upload">{{loaded}} Мб</span> из
                <span class="total">{{total}} Мб</span>
                <span class="percents">{{loading}}% загружено</span>
              </div>
            </div>
          </div>

          <button type="button" class="cancel_btn" @click="file=null" v-if="!loading">Отмена</button>
        </div>
      </div>

      <div class="submit">
        <button type="submit" class="submit_btn">Отправить</button>
      </div>
    </form>

    <img data-src="/images/bg_performance.svg" alt="" class="bg lozad loaded" src="/images/bg_performance.svg" data-loaded="true">
  </div>
</div>
</template>

<script>
    export default {
        name: "v-upload-video-task-report",
        props: ['task'],
        data () {
            return {
              file: null,
              loading: 0,
              loaded: 0,
              total: 0
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
          fileRemove (index) {
            this.file = null;
          },
          handleUpload() {
            if (this.$refs.file && this.$refs.file.files[0]) {
              let file = this.$refs.file.files[0];
              let allowed_mime_types = [ 'video/mov', 'video/mp4','video/mpeg','video/mpg' ];
              let allowed_size_mb = 300;
              if(allowed_mime_types.indexOf(file.type) === -1) {
                return "toast:error".exec("Неверный формат файла!");
              }
              if(file.size > allowed_size_mb*1024*1024) {
                return "toast:error".exec("Превышен максимальный размер файла!");
              }
              this.file = file;
              this.total = ljs.help.number_format(file.size / 1048576, 2);
            }
          },
          send() {
            if (this.file) {

              jax.progress(this.progress.bind(this)).params({files: [this.file]}).user.video_report(this.task.id)
                  .then(() => {
                  })

            } else {

              "toast::error".exec("Сначала выберите файл.");
            }
          },
          progress (e) {
            this.loading = Math.round((e.loaded / e.total) * 100);
            this.loaded = ljs.help.number_format(e.loaded / 1048576, 2);
            this.total = ljs.help.number_format(e.total / 1048576, 2);
          }
        }
    }
</script>
