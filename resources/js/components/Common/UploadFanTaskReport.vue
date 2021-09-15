<template>
  <div class="upload_report">
    <div class="title">Загрузите ваш отчет</div>

    <div class="info">
      <form @submit.prevent.stop="send_report()" class="form">

        <div :class="{'cols row': is_photo || is_video}">

          <div class="col">

            <div class="line" v-if="is_text">
              <div class="field">
                  <textarea v-model="comment" ref="text" placeholder="Комментарий"></textarea>

                  <v-home-smiles-commentary v-if="myref" :show_smiles="true" :show_stickers="false" v-model="comment" :target="myref" />
              </div>
            </div>

            <div class="line">
              <div class="field">
                <input v-model="q" type="text" class="input" placeholder="За кого болеешь">

                <div v-if="users_local.length && users_local[0].full_name !== q" class="fieldset" style="display: block">
                    <template v-for="user in users_local">
                        <a href="javascript:;"  @click="save_changes(user.full_name,user.id)">
                            <div class="avatar" v-html="user.avatar"></div>
                            <div class="name">{{user.full_name}}</div>
                            <v-icon icon="ic_link" @click.stop="open(`/user/${user.id}`)" />
                        </a>
                    </template>
                </div>
              </div>
            </div>
          </div>

            <div class="col" v-if="is_video || is_photo">
                <v-file-uploader
                    :image="is_photo"
                    :video="is_video"
                    v-model="file"
                />
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
  name: "v-upload-fan-task_report",
  props: ['task'],
  data() {
    return {
      users_local: {},
      q: '',
      comment: '',
        file: null,
      myref: null,
      fun_user_id: null,
      fun_full_name: '',
    }
  },
  mounted() {
      this.myref = this.$refs.text;
      document.addEventListener('click', this.hide.bind(this));
  },
    beforeDestroy() {
        document.removeEventListener('click', this.hide.bind(this));
    },
    computed: {
      is_photo () {
          let type = this.task.report_type;
          return type === 'image' || type === 'text_or_image_or_video' || type === 'image_or_video' || type === 'text_or_image'
      },
      is_video () {
          let type = this.task.report_type;
          return type === 'video' || type === 'text_or_image_or_video' || type === 'image_or_video' || type === 'text_or_video'
      },
      is_text () {
          let type = this.task.report_type;
          return type === 'text' || type === 'text_or_image_or_video' || type === 'text_or_video' || type === 'text_or_image'
      },
    },
    watch:{
    q(val) {
      if (val) this.users(val);
    }
  },
  methods: {
      open (link) {
          console.log(link);
          window.open(link,'_blank');
      },
      hide () {
          this.users_local = {};
      },
    users() {
        if (this.q) jax.user.search_users(this.q)
            .then((data) => {
                this.users_local = data
            })
    },
    save_changes(full_name,user_id,) {
      this.fun_user_id = user_id
      this.fun_full_name = full_name
      this.users_local = [];
      this.q = this.fun_full_name
    },
    send_report() {
      let video = this.is_video ? !!this.file : true;
      let photo = this.is_photo ? !!this.file : true;
      let text = this.is_text ? !!this.comment : true;
      if (this.task.id && this.fun_user_id && video && photo && text) {

          jax.user.text_report_for_fans(this.task.id,this.comment,this.fun_user_id,this.file)
              .then(() => {

              })
      } else {

          if (!text) {
              "toast:error".exec("Напишите комментарий!");
          } else if (!this.fun_user_id) {
              "toast:error".exec("Выберите пожалуйста за кого вы болеете!");
          } else if (!video || !photo) {
              "toast::error".exec("Сначала выберите файл.");
          }
      }
    }
  }
}
</script>

<style scoped>

</style>
