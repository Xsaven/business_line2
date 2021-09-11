<template>
  <div class="upload_report">
    <div class="title">Загрузите ваш отчёт </div>

    <div class="info">
      <form @submit.prevent.stop="send" class="form">
        <div class="line">
          <div class="field">
              <textarea v-model="comment" ref="text" name="comment" placeholder="Комментарий" class="min_h"></textarea>

              <v-home-smiles-commentary v-if="myref" :show_smiles="true" :show_stickers="false" :target="myref" />
          </div>
        </div>

          <v-file-uploader
              :image="false"
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
  name: "v-upload-text-or-video",
  props: ['task'],
  data () {
    return {
        file: null,
        uploaded: false,
        comment: '',
        myref: null,
    };
  },
  mounted () {
      this.myref = this.$refs.text;
  },
  computed: {},
  watch: {},
  methods: {
    send() {
        if (this.file || !!this.comment) {

            jax.user.text_or_video_report(this.task.id,this.comment,this.file)
                .then(() => {
                })

        } else {

            "toast::error".exec("Сначала выберите файл или напишите комментарий.");
        }
    }
  }
}
</script>

<style scoped>

</style>
