<template>
  <div class="reports">
    <div class="my_report">
      <div class="title">Мой отчет</div>

      <div class="tasks_list">
        <div class="list">
          <div class="task_wrap">
            <div class="task">
              <div class="head">
                <div class="title">
                  <a :href="`task/${task.id}`">{{task.name}}</a>
                </div>

                <div class="date">{{String(report.month).split('-')[1]}} {{month[String(report.month).split('-')[1]]}} {{String(report.time)}}</div>
              </div>

              <div class="author">
                <div class="avatar" v-html="user.avatar">
                </div>

                <div>
                  <div class="name">{{user.name}}</div>
                  <div class="text">{{report.comment}}</div>
                </div>
              </div>

              <div class="video" v-for="image in report.files">
                <img :src="image.files" alt="" class="lozad">
<!--                <svg class="icon"><use xlink:href="/images/sprite.svg#ic_video_play"></use></svg>-->
              </div>

              <div class="bottom">
                <button class="like_btn active">
                  <span>{{report.likes}}</span>
<!--                  <svg class="icon"><use xlink:href="/images/sprite.svg#ic_like"></use></svg>-->
                  <v-icon icon="ic_like"/>
<!--                  <svg class="icon"><use xlink:href="/images/sprite.svg#ic_like_a"></use></svg>-->
                  <v-icon icon="ic_like_a" />
                </button>
              </div>
            </div>


            <div class="dialog">
              <div class="messages">
                <div class="message">
                  <div class="user">
                    <div class="avatar">
                      <span>АВ</span>
                      <img data-src="/images/tmp/user_avatar.jpg" alt="" class="lozad">
                    </div>

                    <div>
                      <div class="name">
                        <a href="/">Алена Васильева</a>
                      </div>
                      <div class="date">21 августа 18:47</div>
                    </div>
                  </div>

                  <div class="text">
                    <img src="/images/tmp/dialog_img.jpg" alt="">
                  </div>
                </div>

                <div class="message">
                  <div class="user">
                    <div class="avatar">
                      <span>АН</span>
                    </div>

                    <div>
                      <div class="name">
                        <a href="/">Алексей Николае...</a>
                      </div>
                      <div class="date">21 августа 18:47</div>
                    </div>
                  </div>

                  <div class="text">
                    😀
                  </div>
                </div>
              </div>

              <div class="add_message">
                <div class="smiles modal_cont">
                  <button type="button" class="btn mini_modal_btn" data-modal-id="#smiles_modal">
<!--                    <svg class="icon"><use xlink:href="/images/sprite.svg#ic_smile"></use></svg>-->
                    <v-icon icon="ic_smile"/>
                  </button>

                  <div class="mini_modal" id="smiles_modal">
                    <button type="button" class="close_btn">
<!--                      <svg class="icon"><use xlink:href="/images/sprite.svg#ic_close"></use></svg>-->
                      <v-icon icon="ic_close"/>
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
          </div>
        </div>
      </div>
    </div>


    <div class="head">
      <div class="title">Отчеты участников (0)</div>
    </div>

    <div class="empty">Здесь скоро появятся отчёты других участников</div>
  </div>
</template>

<script>
export default {
  $sync: ['user'],
  name: "v-my-report",
  props: ['report','task'],
  data() {
    return {
      user: {},
      month: {
        '01': 'января',
        '02': 'февраля',
        '03': 'марта',
        '04': 'апреля',
        '05': 'мая',
        '06': 'июня',
        '07': 'июля',
        '08': 'августа',
        '09': 'сентября',
        '10': 'октября',
        '11': 'ноября',
        '12': 'декабря',
      },
    }
  }

}
</script>

<style scoped>

</style>
