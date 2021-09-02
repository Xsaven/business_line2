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
                <span>Прикрепить видео</span>

              <div class="rules">mov, mp4, mpeg, mpg до 20 МБ</div>
            </label>
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
        name: "v-upload-video-task-report",
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
            Object.values(this.$refs.file.files).map((file) => this.files.push(file));
          },
          send() {
            jax.params({files: this.files}).user.video_report(this.task.id,this.comment)
              .then(() => {
                console.log(this.task);
              })
          }
        }
    }
</script>
