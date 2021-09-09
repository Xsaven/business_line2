<template>
  <div class="upload_report">
    <div class="title">Загрузите ваш отчёт</div>

    <div class="info">
      <form action="" class="form">
        <div class="line">
          <div class="field">
            <textarea v-model="comment" ref="text" placeholder="Комментарий" class="min_h"></textarea>

            <div class="smiles modal_cont">
              <button type="button" class="btn mini_modal_btn" data-modal-id="#smiles_modal">
                <v-icon icon="ic_smile" />
              </button>

              <v-home-smiles-commentary :target="$refs.text" />
            </div>
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
          <button @click.prevent.stop="send()" type="submit" class="submit_btn">Отправить</button>
        </div>
      </form>

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
    </div>
  </div>
</template>

<script>
export default {
  name: "v-upload-text-or-image",
  props: ['task'],
  data () {
    return {
      file: null,
      comment: '',
      uploaded: false
    };
  },
  mounted () {},
  computed: {},
  watch: {},
  methods: {
    send() {
      jax.user.text_or_image_report(this.task.id,this.comment,this.file)
          .then(() => {
          })
    }
  }
}
</script>

<style scoped>

</style>
