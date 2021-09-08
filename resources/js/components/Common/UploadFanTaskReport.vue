<template>
  <div class="upload_report">
    <div class="title">Загрузи свой отчет</div>

    <div class="info">
      <form @submit.prevent.stop="send_report()" action="" class="form">
        <div class="cols row">
          <div class="col">
            <div class="line">
              <div class="field">
                <textarea v-model="form.comment" placeholder="Комментарий"></textarea>

                <v-home-smiles-commentary />
              </div>
            </div>

            <div class="line">
              <div class="field">
                <input v-model="q" type="text" class="input" placeholder="За кого болеешь">

                <div v-if="users_local.length" class="fieldset" style="display: block">
                  <div v-for="user in users_local">
                    <div class="avatar" v-html="user.avatar"></div>
                    <div @click="save_changes(user.full_name,user.id)" class="name">{{user.full_name}}</div>
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
  props: ['task'],
  data() {
    return {
      users_local: {},
      q: '',
      form: {
        comment: ''
      },
      fun_user_id: null,
      fun_full_name: '',
    }
  },
  mounted() {
  },
  watch:{
    q(val) {
      if (val) this.users(val);
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
    save_changes(full_name,user_id,) {
      this.fun_user_id = user_id
      this.fun_full_name = full_name
      this.q = this.fun_full_name
      this.users_local.splice(0)
    },
    send_report() {
      jax.user.text_report_for_fans(this.task.id,this.form.comment,this.fun_user_id)
          .then(() => {

          })
    }
  }
}
</script>

<style scoped>

</style>
