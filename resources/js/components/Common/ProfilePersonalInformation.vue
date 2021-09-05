<template>
    <section class="lk_data">

        <div class="personal">
            <div class="user_data">
                <div class="name">
                    <span>{{user.name}}<br> {{user.lastname}}</span>
                    <button class="edit_btn" @click="edit_btn">
                        <v-icon icon="ic_edit" />
                    </button>
                </div>

                <div class="user_name">{{user.login}}</div>

                <div class="info" v-if="user.position">
                    <div>{{user.position}}</div>
                    <div>{{user.division}}</div>
                </div>

                <div class="desc">
                    <div class="title">О себе:</div>

                    <div>{{user.about}}</div>
                </div>

              <div class="direction" v-if="user.follow_direction">
                Направление участия: <a :href="`/direction/${user.follow_direction.slug}`">{{user.follow_direction.name}}</a>
              </div>
            </div>


            <form v-if="edit" @submit.stop.prevent="update" class="form edit_form">
                <div class="name">{{user.name}} {{user.last_name}}</div>

                <div class="line">
                    <div class="field">
                        <input type="text" v-model="form.login" class="input" :placeholder="user.login">
                    </div>
                </div>

                <div class="line">
                    <div class="field">
                        <v-select v-model="form.position_id">
                            <option v-if="!user.position" value="0" data-display="Должность"></option>
<!--                            <option v-else value="0" :data-display="user.position"></option>-->
                            <option v-for="position in positions" :selected="user.position_id === position.id" :value="position.id">{{position.name}}</option>
                        </v-select>
                    </div>
                </div>

                <div class="line">
                    <div class="field">
                        <v-select v-model="form.division_id">
                            <option v-if="!user.division" value="0" data-display="Подразделение"></option>
<!--                            <option v-else value="0" :data-display="user.division"></option>-->
                            <option v-for="division in divisions" :selected="user.division_id === division.id" :value="division.id">{{division.name}}</option>
                        </v-select>
                    </div>
                </div>

                <div class="line">
                    <div class="field" >
                      <textarea v-model="form.about" v-if="!user.about" placeholder="О себе"></textarea>
                      <textarea v-else v-model="form.about"></textarea>
                    </div>
                </div>

                <div class="submit">
                    <button type="submit" class="submit_btn">Сохранить</button>
                    <button type="button" class="cancel_btn" ref="cancel_btn" @click="cancel">Отмена</button>
                </div>
            </form>


            <div class="avatar">
                <div class="img" v-html="avatar"></div>

                <div class="upload">
                    <input type="file" name="avatar" id="avatar" ref="file" @change="handleUpload">
                    <label for="avatar">Загрузить фото</label>
                </div>

                <div class="logout" style="margin-top: 32px;line-height: 19px;display: block;cursor: pointer;text-align: center;text-decoration-line: underline;">
                    <a href="/logout" target style="color: #fff;">Выйти</a>
                </div>
            </div>
        </div>

        <div class="tasks_list">
            <div class="title">Выполненные задания ({{user.complete_tasks_count}})</div>

            <div class="list" v-if="Number(user.complete_tasks_count)">

            </div>
        </div>
    </section>
</template>

<script>
    export default {
        $sync: ['user'],
        name: "v-profile-personal-information",
        props: ['positions','divisions'],
        data () {
            return {
                edit: false,
                user: {},
                form: {
                  login: '',
                  division_id: null,
                  position_id: null,
                  about: ''
                }
            };
        },
        mounted () {
          this.update_state();
        },
        computed: {
            avatar () {
                return this.user.avatar + "<img data-src=\"/images/bg_user_avatar.svg\" alt=\"\" class=\"lozad bg\">";
            }
        },
        watch: {},
        methods: {
          update_state() {
            this.form.login = this.user.login;
            this.form.division_id = this.user.division_id;
            this.form.position_id = this.user.position_id;
            this.form.about = this.user.about;
          },
          edit_btn (e) {
            this.update_state()
            this.edit = true;
            ljs.onetime(() => {
              let parent = $(e.target).closest('.personal')
              parent.find('.user_data').hide()
              parent.find('.edit_form, .avatar .upload').fadeIn(300)
              parent.find('.avatar .logout').fadeOut(300)
            });
          },
          cancel () {
            let parent = $(this.$refs.cancel_btn).closest('.personal')
            parent.find('.edit_form, .avatar .upload').hide()
            parent.find('.edit_form, .avatar .logout').show()
            parent.find('.user_data').fadeIn(300)
            ljs.onetime(() => {
              this.edit = false;
            }, 301)
          },
          handleUpload() {
            jax.param('avatar', Object.values(this.$refs.file.files)[0])
                .user
                .upload_avatar().then(() => {
              //window.location.reload();
              jax.user.update().then(({data}) => {
                state.user = data;
                ljs.onetime(() => {
                  const observer = lozad('.lozad', {
                    rootMargin: '200px 0px',
                    threshold: 0,
                    loaded: (el) => el.classList.add('loaded')
                  });
                  observer.observe();
                },200);
              });
            });
          },
          update () {
            jax.user.update_user_data(
                this.form.login,
                this.form.division_id,
                this.form.position_id,
                this.form.about,
            ).then(() => this.cancel());
          }
        }
    }
</script>
