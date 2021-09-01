<template>
  <div class="upload_report">
    <div class="title">Загрузи свой отчет</div>

    <div class="info">
      <form action="" class="form">
        <div class="line">
          <div class="field">
            <textarea name="" placeholder="Комментарий" class="min_h"></textarea>

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
              <span>Прикрепить фото</span>

              <div class="rules">jpg, jpeg, png до 10 МБ</div>
            </label>
          </div>
        </div>

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
  name: "v-upload-text-or-image"
}
</script>

<style scoped>

</style>
