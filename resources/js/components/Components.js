/**
 * A place for manual connection of VueJs components.
 * @param Vue
 */
module.exports = (Vue) => {

    Vue.component('v-layout', require('./Layout.vue').default);
    Vue.component('v-icon', require('./Common/SvgIcon.vue').default);
    Vue.component('v-loading-plugin', require('vue-element-loading'));
    Vue.component('v-nodes', {functional: true, render: (h, ctx) => ctx.props.nodes});
    Vue.component('v-loading', require('./Common/Loading.vue').default);
    Vue.component('v-new-commentaries', require('./Common/NewCommentares.vue').default);
    Vue.component('v-bottom-action', require('./Common/BottomActions.vue').default);
    Vue.component('v-upload-task-report', require('./Common/UploadTaskRepoprt.vue').default);
    Vue.component('v-upload-task-status', require('./Common/UploadTaskStatus.vue').default);
    Vue.component('v-upload-task-quiz', require('./Common/UploadTaskQuiz.vue').default);
}
