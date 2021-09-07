<template>
  <div class="upload_report">
    <div class="title">Загрузи свой отчет</div>

    <div class="info">
      <form action="" class="form">
        <div class="cols row">
          <div class="col">
            <div class="line">
              <div class="field">
                <textarea v-model="form.comment" placeholder="Комментарий"></textarea>

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
                <input v-model="q" type="text" name="" value="" class="input" placeholder="За кого болеешь">

                <div v-if="q" class="fieldset" style="display: block">
                  <div v-for="user in users_local">
                    <div class="avatar" v-html="user.avatar"></div>
                    <div @click="send_report(user.full_name,user.id)" class="name">{{user.full_name}}</div>
                  </div>
                </div>
              </div>
            </div>
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
  data() {
    return {
      users_local: {},
      q: '',
      form: {
        user_id: null,
        comment: ''
      },
      fun_user_id: null,
      fun_full_name: '',
    }
  },
  mounted() {
  },
  watch:{
    q() {
      this.users(this.q);
    }
  },
  methods: {
    users() {
      if(String(this.q).indexOf(' ') === -1) {
        jax.user.search_users(this.q)
            .then((data) => {
              this.users_local = data
            })
      }
    },
    send_report(full_name,user_id,) {
      this.fun_user_id = user_id
      this.fun_full_name = full_name
      this.q = this.fun_full_name
      this.users_local.splice(0)
    }
  }
}
</script>

<style scoped>

</style>
