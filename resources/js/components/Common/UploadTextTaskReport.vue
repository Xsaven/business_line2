<template>
  <div class="upload_report">
    <div class="title">Загрузите ваш отчет </div>

    <div class="info">
      <form @submit.prevent.stop="send" class="form">
            <div class="line">
              <div class="field">
                  <textarea v-model="comment" ref="text" name="comment" placeholder="Комментарий"></textarea>

                  <v-home-smiles-commentary v-if="myref" :show_smiles="true" :show_stickers="false" v-model="comment" :target="myref" />
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
        name: "v-upload-text-task-report",
        props: ['task'],
        data () {
            return {
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

                  jax.user.text_report(this.task.id,this.comment)
                      .then(() => {})

              } else {

                  "toast::error".exec("Сначала напишите комментарий.");
              }
          }
        }
    }
</script>
