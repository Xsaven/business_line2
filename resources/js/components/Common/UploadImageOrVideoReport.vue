<template>
  <div class="upload_report">
    <div class="title">Загрузи свой отчет</div>
    <div class="info">
      <form action="" class="form">
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
  name: "v-upload-image-or-video"
}
</script>

<style scoped>

</style>
