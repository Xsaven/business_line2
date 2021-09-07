<template>
  <div class="upload_report">
    <div class="title">Загрузи свой отчет</div>

    <div class="info">
      <form action="" class="form">
        <div class="line files">
          <div class="choose field">
            <input type="file" name="file" id="file">
            <label for="file">
              <svg class="icon"><use xlink:href="/images/sprite.svg#ic_attachment"></use></svg>
              <span>Прикрепить фото</span>

              <div class="rules">jpg, jpeg, png до 10 МБ</div>
            </label>
          </div>

          <div class="loading" style="display: block;">
            <div class="row" v-for="(file, f_key) in files">
              <div class="icon">
                <svg><use xlink:href="/images/sprite.svg#ic_file2"></use></svg>
              </div>

              <div>
                <div class="name inline">Длинное название файла.mp4</div>

                <div class="progress">
                  <div class="bar" style="width: 70%;"></div>
                </div>

                <div class="size">
                  <span class="upload">28 Мб</span> из
                  <span class="total">57 Мб</span>
                  <span class="percents">78% загружено</span>
                </div>
              </div>
            </div>

            <button type="button" class="cancel_btn">
              <svg class="icon"><use xlink:href="/images/sprite.svg#ic_delete"></use></svg>
            </button>
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
        name: "v-upload-image-task-report",
        props: ['task'],
        data () {
            return {
                files: [],
                comment: ''
            };
        },
        mounted () {},
        computed: {},
        watch: {},
        methods: {
          fileRemove (index) {
            this.files =  this.files.filter((i,k) => index!==k);
          },
          handleUpload() {
            console.log(1)
            Object.values(this.$refs.file.files).map((file) => this.files.push(file));
          },
          send() {
            jax.params({files: this.files}).user.image_report(this.task.id,this.comment)
              .then(() => {
              })
          }
        }
    }
</script>
