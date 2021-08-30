<template>
  <div class="upload_report">
    <div class="title">Загрузи свой отчет</div>

    <div class="info">
      <form action="" class="form">
        <div class="cols row">
          <div class="col">
            <div class="line">
              <div class="field">
                <textarea name="" placeholder="Комментарий"></textarea>

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

            <div class="line">
              <div class="field">
                <input type="text" name="" value="" class="input" placeholder="За кого болеешь">

                <div class="fieldset">
                  <div>
                    <div class="avatar">ИИ</div>
                    <div class="name">Иван Иванов</div>
                  </div>

                  <div>
                    <div class="avatar">НИ</div>
                    <div class="name">Наталья Иванова</div>
                  </div>

                  <div>
                    <div class="avatar">ИИ</div>
                    <div class="name">Иван Иванов</div>
                  </div>

                  <div>
                    <div class="avatar">НИ</div>
                    <div class="name">Наталья Иванова</div>
                  </div>

                  <div>
                    <div class="avatar">ИИ</div>
                    <div class="name">Иван Иванов</div>
                  </div>

                  <div>
                    <div class="avatar">НИ</div>
                    <div class="name">Наталья Иванова</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="line files">
              <div class="selected">
                <div v-for="(file, f_key) in files" class="file">
                  <v-icon icon="ic_file" />

                  <div class="name">{{file.name}}</div>

                  <button type="button" @click="fileRemove(f_key)" class="del_btn">
                    <svg><use xlink:href="/images/sprite.svg#ic_delete"></use></svg>
                  </button>
                </div>
              </div>

              <div class="field">
                <input type="file" name="file" id="file" ref="file" @change="handleUpload" multiple>
                <label for="file">
                  <v-icon icon="ic_attachment" />
                  <span>Прикрепить фото/ видео</span>

                  <div class="rules">jpg, jpeg, png до 10 МБ<br> mov, mp4, mpeg, mpg до 20 МБ</div>
                </label>
              </div>
            </div>
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
        name: "v-upload-task-report",
        props: {},
        data () {
            return {
                files: []
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
          fileRemove (index) {
            // console.log(123);
            this.files = this.files.filter((i,k) => index!==k);
          },
          handleUpload() {
            //this.$set(this, 'files', this.$refs.file.files);
            // console.log(this.$refs.file.files);
            Object.values(this.$refs.file.files).map((file) => this.files.push(file));
          }
        }
    }
</script>
