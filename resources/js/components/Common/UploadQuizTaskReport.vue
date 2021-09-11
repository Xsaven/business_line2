<template>
  <div class="performance" ref="p">
    <div class="title">Выполнение задания</div>

    <div class="info">
      <div class="quiz_start">
        <div>Нажмите, чтобы приступить к выполнению</div>
        <button class="start_btn" type="button" @click="start">Старт</button>
      </div>

      <form class="quiz" ref="quiz">
        <div class="head">
          <div class="steps">
            <template v-for="(quiz,i) in quiz">
              <div  :class="{'active': !i, 'error': !ri_answer[i] && ri_answer[i] !== undefined && ri_answer[i] !== null, 'success': ri_answer[i]}">{{i + 1}}</div>
            </template>
          </div>

          <div class="time">
            <span class="minutes">00</span>
            <span class="sep">:</span>
            <span class="seconds">{{seconds}}</span>
          </div>
        </div>

        <template v-for="(question,i) in quiz">
          <div :class="`step step${i + 1}`" :key="`quiz_${i}`">
              <div class="height">
                  <div class="question">{{question.question}}</div>


                      <div  class="answers">
                          <div class="field">
                              <template v-for="(answer,k) in question.answers">
                                  <input :value="answer.id" v-model="quiz_answers[i]" type="radio"  :name="`group${i}`" :id="`group1_check${k}_${i}`" :key="`quiz_answer_${k}_input`">
                                  <label :for="`group1_check${k}_${i}`" :key="`quiz_answer_${k}_label`">{{answer.answer}}</label>
                              </template>
                          </div>
                      </div>

              </div>
          </div>
        </template>

        <button v-if="currentStep !== quiz.length + 1" type="button" class="next_btn" @click="nextQ">Ответить</button>
      </form>


      <div class="quiz_result">
        <!--            <svg class="icon success"><use xlink:href="images/sprite.svg#ic_success"></use></svg>-->
        <v-icon v-if="!hase"  icon="ic_success" class="icon success"/>
        <!-- <svg class="icon error"><use xlink:href="images/sprite.svg#ic_bad"></use></svg> -->
        <v-icon v-else icon="ic_bad" class="error"/>

        <div v-if="!hase">Вы ответили на все вопросы правильно!</div>
        <div v-else>У вас несколько ошибок</div>
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
              quiz_answers: [],
              currentStep: 1,
              balls: 0,
              ri_answer: [],
              hase: false,
                sec: 20,
                timer: null
            };
        },
        mounted () {
          //this.quiz.map((v,i) => this.ri_answer[i] = undefined)
        },
        computed: {
          has_errors () {
            return !!this.ri_answer.filter((i) => !i).length;
          },
            seconds () {
              return this.sec > 9 ? this.sec : `0${this.sec}`;
            }
        },
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
          answer_check(id, index) {

            jax.user.answer(id)
                .then(({result}) => {
                  this.ri_answer[index] = result;
                  let steps = $('.task_info .performance .quiz .steps > *');
                  steps.eq(index).addClass(result ? 'success' : 'error');
                  if(!result) this.hase = true
                })
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
            this.ri_answer[this.currentStep-1] = null;
            if (this.quiz_answers[this.currentStep-1] === undefined) {
              return "toast:error".exec("Для продолжения дайте правильный ответ!");
            }
            this.answer_check(this.quiz_answers[this.currentStep-1], this.currentStep-1)
            let parent = $(this.$refs.quiz)
            let steps = $('.task_info .performance .quiz .steps > *');
            steps.removeClass('active')
            steps.eq(this.currentStep).addClass('active')
            //steps.eq(this.currentStep - 1).addClass('success')

              this.sec = 20;
            this.currentStep++

            if (this.currentStep === (this.quiz.length + 1)) return this.finishQ();

            parent.find('.step').removeClass('show').hide()
            parent.find('.step' + this.currentStep).addClass('show').fadeIn(300)

            if (this.currentStep > steps.length) {
              $('.task_info .performance .quiz').hide()
              $('.task_info .performance .quiz_result').fadeIn(300)
            }
          },
          start () {
              let parent = $(this.$refs.p)

            parent.find('.quiz_start').hide()
            parent.find('.quiz, .step1').fadeIn(300).addClass('show')
              window.setHeight($('.task_info .performance .quiz .step .height'))

            // Секундомер
              if (this.timer) clearInterval(this.timer);
              this.timer = setInterval(this.timerCycle.bind(this), 1000);
          },
            timerCycle () {
                if (this.sec === 0) {
                    this.quiz_answers[this.currentStep-1] = 0;
                    this.nextQ();
                    return ;
                }
                this.sec--;
            },
          results() {
            console.log(this.quiz_answers);
          }
        }
    }
</script>
