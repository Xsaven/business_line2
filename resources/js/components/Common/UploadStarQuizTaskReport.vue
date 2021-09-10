<template>
  <section class="task_info">
    <div class="performance" ref="p">
      <div class="title">Выполнение задания</div>

      <div class="info">
        <div class="quiz_start">
          <div>Нажмите, чтобы приступить к выполнению</div>
          <button class="start_btn" @click="start">Старт</button>
        </div>

        <form action="" class="quiz" ref="quiz">
          <div class="head">
            <div class="steps">
              <template v-for="(quiz,i) in star_quiz">
              <div :class="{'active': !i,}">{{i + 1}}</div>
              </template>
            </div>

<!--            <div class="time">-->
<!--              <span class="minutes">00</span>-->
<!--              <span class="sep">:</span>-->
<!--              <span class="seconds">00</span>-->
<!--            </div>-->
          </div>

          <template v-for="(question,i) in star_quiz">
            <div :class="`step step${i + 1}`" :key="`quiz_${i}`">
              <div class="question">{{ question.question }}</div>

              <template v-for="(answer,k) in question.answers">
                <div class="answers" :key="`quiz_answer_${k}`">
                  <div class="field">
                    <input :value="answer.id" v-model="quiz_answers[i]" type="radio" :name="`group${i}`" :id="`group1_check${k}_${i}`">
                    <label :for="`group1_check${k}_${i}`">{{answer.answer}}</label>
                  </div>
                </div>
              </template>
            </div>
          </template>

          <button v-if="currentStep !== star_quiz.length + 1" type="button" class="next_btn" @click="nextQ">Ответить</button>
        </form>

        <div class="quiz_result">
          <div class="you_look_like">
            <div class="photo">
              <img :src="`/${star.photo}`" alt="" class="lozad">
            </div>

            <div class="text">
              <div>Вы похожи на {{star.name}} – Вот это да!</div>

              <div>{{star.text}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "v-upload-star-quiz-task-report",
  props: {
    star_quiz: {required: true},
    task: {required: true},
  },
  data() {
    return {
      currentStep: 1,
      quiz_answers: [],
      star: {},
    }
  },
  methods: {
    finishQ () {
      jax.user.star_quiz_report(this.task.id,this.quiz_answers)
          .then((data) => {
            this.star = data.star
            $('.task_info .performance .quiz').hide()
            $('.task_info .performance .quiz_result').fadeIn(300)
          })
    },
    nextQ() {
      if (this.quiz_answers[this.currentStep-1] === undefined) {
        return "toast:error".exec("Для начала дайте правельный ответ!");
      }
      let parent = $(this.$refs.quiz)
      let steps = $('.task_info .performance .quiz .steps > *');
      steps.removeClass('active')
      steps.eq(this.currentStep).addClass('active')
      steps.eq(this.currentStep - 1).addClass('success')

      this.currentStep++

      if (this.currentStep === (this.star_quiz.length + 1)) return this.finishQ();

      parent.find('.step').hide()
      parent.find('.step' + this.currentStep).fadeIn(300)

      if (this.currentStep > steps.length) {
        $('.task_info .performance .quiz').hide()
        $('.task_info .performance .quiz_result').fadeIn(300)
      }
    },
    start() {
      let parent = $(this.$refs.p)

      parent.find('.quiz_start').hide()
      parent.find('.quiz').fadeIn(300)

      // Секундомер
      //this.timerCycle()
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
    },
  }
}
</script>


<style scoped>

</style>
