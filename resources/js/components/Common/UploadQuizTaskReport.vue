<template>
  <div class="performance" ref="p">
    <div class="title">Выполнение задания</div>

    <div class="info">
      <div class="quiz_start">
        <div>Нажми, чтобы приступить к выполнению</div>
        <button class="start_btn" type="button" @click="start">Старт</button>
      </div>

      <form class="quiz" ref="quiz">
        <div class="head">
          <div class="steps">
            <div v-for="(quiz,i) in quiz" :class="{'active': true}">{{i + 1}}</div>
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
                  <input :value="answer.id" v-model="quiz_answers[question.id]" type="radio"  :name="`group${i}`" :id="`group1_check${k}_${i}`">
                  <label :for="`group1_check${k}_${i}`">{{answer.answer}}</label>
                </div>
              </div>
            </template>
          </div>
        </template>

        <button v-if="currentStep !== quiz.length + 1" type="button" class="next_btn" @click="nextQ">Ответить</button>
      </form>


      <div class="quiz_result">
        <!--            <svg class="icon success"><use xlink:href="images/sprite.svg#ic_success"></use></svg>-->
        <v-icon icon="ic_success" class="icon success"/>
        <!-- <svg class="icon error"><use xlink:href="images/sprite.svg#ic_bad"></use></svg> -->

        <div>Вы закончили викторину!</div>
        <div class="scores">+{{this.balls}} {{declOfNum(task.balls,['бал','бала','баллов'])}}</div>
      </div>

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
    </div>
  </div>
</template>

<script>
    export default {
        name: "v-upload-quiz-task-report",
        props: {
          quiz:{required:true},
          task: {required:true}
        },
        data () {
            return {
              quiz_answers: {},
              currentStep: 1,
              balls: 0,
            };
        },
        mounted () {

        },
        computed: {},
        watch: {},
        methods: {

          declOfNum(n, text_forms) {
            n = Math.abs(n) % 100;
            var n1 = n % 10;
            if (n > 10 && n < 20) { return text_forms[2]; }
            if (n1 > 1 && n1 < 5) { return text_forms[1]; }
            if (n1 === 1) { return text_forms[0]; }
            return text_forms[2];
          },
          finishQ () {
            jax.user.quiz_report(this.task.id,this.quiz_answers)
              .then((data) => {
                this.balls = data.balls;
                $('.task_info .performance .quiz').hide()
                $('.task_info .performance .quiz_result').fadeIn(300)
              })
          },
          nextQ () {

            let parent = $(this.$refs.quiz)
            let steps = $('.task_info .performance .quiz .steps > *');
            steps.removeClass('active')
            steps.eq(this.currentStep).addClass('active')
            steps.eq(this.currentStep - 1).addClass('success')

            this.currentStep++
            if (this.currentStep === (this.quiz.length + 1)) return this.finishQ();

            parent.find('.step').hide()
            parent.find('.step' + this.currentStep).fadeIn(300)

            if (this.currentStep > steps.length) {
              $('.task_info .performance .quiz').hide()
              $('.task_info .performance .quiz_result').fadeIn(300)
            }
          },
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
          },
          results() {
            console.log(this.quiz_answers);
          }
        }
    }
</script>
