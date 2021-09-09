<template>
  <div class="upload_report">
    <div class="title">Загрузите ваш отчёт </div>

    <div class="info">
      <form action="" class="form">
            <div class="line">
              <div class="field">
                <textarea v-model="comment" name="" placeholder="Комментарий"></textarea>

                <div class="smiles modal_cont">
                  <button type="button" class="btn mini_modal_btn" data-modal-id="#smiles_modal">
                    <v-icon icon="ic_smile" />
                  </button>

                  <div class="mini_modal" id="smiles_modal">
                    <button type="button" class="close_btn">
                      <v-icon icon="ic_close" />
                    </button>

                    <div class="section">
                      <div class="title">Эмоджи</div>

                      <div class="row">
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                        <div><img src="/images/tmp/smile_img.png" alt=""></div>
                      </div>
                    </div>

                    <div class="section stickers">
                      <div class="title">Стикеры</div>

                      <div class="row">
                        <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                        <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                        <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                        <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                        <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                        <div><img src="/images/tmp/sticker_img.png" alt=""></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="submit">
          <button @click.prevent.stop="send()" type="submit" class="submit_btn">Отправить</button>
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
                comment: ''
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
          send() {
            jax.user.text_report(this.task.id,this.comment)
              .then(() => {})
          }
        }
    }
</script>
