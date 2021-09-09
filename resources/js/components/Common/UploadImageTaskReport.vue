<template>

  <div class="upload_report">
    <div class="title">Загрузи свой отчет</div>

    <div class="info">
      <form class="form" @submit.stop.prevent="send">

        <v-file-uploader
            :image="true"
            :video="false"
            v-model="file"
            @upload_start="() => {this.uploaded = false}"
            @upload_success="() => {this.uploaded = true}"
            @upload_finish="() => {this.uploaded = true}"
            @upload_drop="() => {this.uploaded = false}"
        />

        <div class="submit">
          <button type="submit" class="submit_btn" :disabled="!uploaded">Отправить</button>
        </div>
      </form>

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad loaded" src="/images/bg_performance.svg" data-loaded="true">
    </div>
  </div>
</template>

<script>
    export default {
        name: "v-upload-image-task-report",
        props: ['task'],
        data () {
            return {
                file: null,
                uploaded: false
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
          send() {
              if (this.file) {

                  jax.user.image_report(this.task.id, this.file)
                      .then(() => {
                      })

              } else {

                  "toast::error".exec("Сначала выберите файл.");
              }
          }
        }
    }
</script>
