<template>
  <div class="upload_report">
    <div class="title">Загрузите ваш отчёт</div>
    <div class="info">
      <form @submit.prevent.stop="send" class="form">
          <v-file-uploader
              :image="true"
              :video="true"
              v-model="file"
              @upload_start="() => {this.uploaded = false}"
              @upload_success="() => {this.uploaded = true}"
              @upload_finish="() => {this.uploaded = true}"
              @upload_drop="() => {this.uploaded = false}"
          />

        <div class="submit">
            <button type="submit" :disabled="!uploaded" class="submit_btn">Отправить</button>
        </div>
      </form>

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
    </div>
  </div>
</template>

<script>
export default {
  name: "v-upload-image-or-video",
  props: ['task'],
  data () {
    return {
        file: null,
        uploaded: false,
    };
  },
  mounted () {},
  computed: {},
  watch: {},
  methods: {
    send() {
        if (this.file) {

            jax.user.image_or_video_report(this.task.id,this.file)
                .then(() => {
                })

        } else {

            "toast::error".exec("Сначала выберите файл.");
        }
    }
  }
}
</script>

<style scoped>

</style>
