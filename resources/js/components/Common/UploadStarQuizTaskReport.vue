<template>
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
                        <div class="height">
                            <div class="question">{{ question.question }}</div>


                            <div class="answers">
                                <div class="field">
                                    <template v-for="(answer,k) in question.answers">
                                        <input :value="answer.id" v-model="quiz_answers[i]" type="radio" :name="`group${i}`" :id="`group1_check${k}_${i}`" :key="`quiz_answer_${k}_input`">
                                        <label :for="`group1_check${k}_${i}`" :key="`quiz_answer_${k}_label`">{{answer.answer}}</label>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <button v-if="currentStep !== star_quiz.length + 1" type="button" class="next_btn" @click="nextQ">Ответить</button>
            </form>

            <div class="quiz_result">
                <div class="you_look_like">
                    <div class="photo">
                        <img :src="link(star.photo)" alt="" class="lozad">
                    </div>

                    <div class="text">
                        <div>Вы похожи на {{star.name}} – вот это да!</div>

                        <div>{{star.text}}</div>
                    </div>
                </div>

                <div class="scores">+{{this.balls}} {{declOfNum(this.balls,['балл','балла','баллов'])}}</div>

            </div>
            <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
        </div>
    </div>
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
      balls: 0
    }
  },
    mounted() {

    },
    methods: {
    link(url) {
      return link(url);
    },
    finishQ () {
      jax.user.star_quiz_report(this.task.id,this.quiz_answers)
          .then(({star, balls}) => {
            this.star = star
            this.balls = balls
            $('.task_info .performance .quiz').hide()
            $('.task_info .performance .quiz_result').fadeIn(300)
          })
    },
    nextQ() {
      if (this.quiz_answers[this.currentStep-1] === undefined) {
        return "toast:error".exec("Для продолжения дайте правильный ответ!");
      }
      let parent = $(this.$refs.quiz)
      let steps = $('.task_info .performance .quiz .steps > *');
      steps.removeClass('active')
      steps.eq(this.currentStep).addClass('active')
      steps.eq(this.currentStep - 1).addClass('success')

      this.currentStep++

      if (this.currentStep === (this.star_quiz.length + 1)) return this.finishQ();

      parent.find('.step').removeClass('show').hide()
      parent.find('.step' + this.currentStep).addClass('show').fadeIn(300)
        window.setHeight($('.task_info .performance .quiz .step .height'))

      if (this.currentStep > steps.length) {
        $('.task_info .performance .quiz').hide()
        $('.task_info .performance .quiz_result').fadeIn(300)
      }
    },
    start() {
      let parent = $(this.$refs.p)

        parent.find('.quiz_start').hide()
        parent.find('.quiz, .step1').fadeIn(300).addClass('show')
        window.setHeight($('.task_info .performance .quiz .step .height'))

      // Секундомер
      //this.timerCycle()
    },
      declOfNum(n, text_forms) {
          n = Math.abs(n) % 100;
          let n1 = n % 10;
          if (n > 10 && n < 20) { return text_forms[2]; }
          if (n1 > 1 && n1 < 5) { return text_forms[1]; }
          if (n1 === 1) { return text_forms[0]; }
          return text_forms[2];
      },
  }
}
</script>


<style scoped>

</style>
