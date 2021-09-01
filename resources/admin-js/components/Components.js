/**
 * A place for manual connection of VueJs components.
 * @param Vue
 */
module.exports = (Vue) => {

    Vue.component('v_timer', require('./Timer.vue').default);
    Vue.component('v_questions', require('./Questions.vue').default);
    Vue.component('v_commentaries', require('./Commentaries.vue').default);
}
