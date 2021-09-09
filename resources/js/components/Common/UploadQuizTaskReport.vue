<template>
  <div class="performance" ref="p">
    <div class="title">Выполнение задания</div>

    <div class="info">
      <div class="quiz_start">
        <div>Нажми, чтобы приступить к выполнению</div>
        <button class="start_btn" type="button" @click="start">Старт</button>
      </div>

      <form class="quiz">
        <div class="head">
          <div class="steps">
            <div v-for="(quiz,i) in quiz" :class="{'active': true}"> {{i + 1}}</div>
          </div>

          <div class="time">
            <span class="minutes">00</span>
            <span class="sep">:</span>
            <span class="seconds">00</span>
          </div>
        </div>

        <template v-for="(question,i) in quiz">
          <div :class="`step step${i + 1}`" :key="`quiz_${i}`">
            <div class="question">{{question.question}}</div>

            <template v-for="(answer,k) in question.answers">
              <div  class="answers" :key="`quiz_answer_${k}`">
                <div class="field">
                  <input type="radio" :name="`group${i}`" :id="`group1_check${k}_${i}`">
                  <label :for="`group1_check${k}_${i}`">{{answer.answer}}</label>
                </div>
              </div>
            </template>
          </div>
        </template>

        <button type="button" class="next_btn">Ответить</button>
      </form>


      <div class="quiz_result">
        <!--            <svg class="icon success"><use xlink:href="images/sprite.svg#ic_success"></use></svg>-->
        <v-icon icon="ic_success" class="icon success"/>
        <!-- <svg class="icon error"><use xlink:href="images/sprite.svg#ic_bad"></use></svg> -->

        <div>Ты ответил на все вопросы правильно!</div>
        <div class="scores">+72 балла</div>
      </div>

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
    </div>
  </div>
</template>

<script>
    export default {
        name: "v-upload-quiz-task-report",
        props: {
          quiz:{required:true}
        },
        data () {
            return {

            };
        },
        mounted () {

        },
        computed: {},
        watch: {},
        methods: {
          start () {
            let parent = $(this.$refs.p)

            parent.find('.quiz_start').hide()
            parent.find('.quiz').fadeIn(300)

            // Секундомер
            this.timerCycle()
          },
          timerCycle() {
            let sec = parseInt(sec)
            let min = parseInt(min)

            sec = sec + 1

            if (sec === 60) {
              min = min + 1
              sec = 0
            }
            if (min === 60) {
              min = 0
              sec = 0
            }

            if (sec < 10 || sec === 0) sec = '0' + sec
            if (min < 10 || min === 0) min = '0' + min

            $('.task_info .performance .quiz .time .minutes').text(min)
            $('.task_info .performance .quiz .time .seconds').text(sec)


            let cycle = setTimeout(timerCycle, 1000)
          }
        }
    }
</script>
