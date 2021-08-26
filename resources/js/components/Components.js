/**
 * A place for manual connection of VueJs components.
 * @param Vue
 */
module.exports = (Vue) => {

    Vue.component('v-layout', require('./Layout.vue').default);
    Vue.component('v-icon', require('./Common/SvgIcon.vue').default);
    Vue.component('v-header', require('./Common/Header.vue').default);
    Vue.component('v-footer', require('./Common/Footer.vue').default);
}
