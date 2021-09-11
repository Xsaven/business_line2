<template>
  <div class="upload_report">
    <div class="title">Загрузите ваш отчет </div>

    <div class="info">
      <form @submit.prevent.stop="send" class="form">
        <div class="line">
          <div class="field">
              <textarea v-model="comment" ref="text" name="comment" placeholder="Комментарий" class="min_h"></textarea>

              <v-home-smiles-commentary v-if="myref" :show_smiles="true" :show_stickers="false" :target="myref" />
          </div>
        </div>

          <v-file-uploader
              :image="true"
              :video="true"
              v-model="file"
          />

          <div class="submit">
              <button type="submit" class="submit_btn">Отправить</button>
          </div>
      </form>

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
    </div>
  </div>
</template>

<script>
export default {
  name: "v-upload-tiv-report",
  props: ['task'],
  data () {
    return {
        file: null,
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

            jax.user.text_or_image_or_video_report(this.task.id,this.comment,this.file)
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
