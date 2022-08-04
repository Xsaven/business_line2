/**
 * A place for manual connection of VueJs components.
 * @param Vue
 */
module.exports = (Vue) => {

    Vue.component("v-layout", require("./Layout.vue").default);
    Vue.component("v-icon", require("./Common/SvgIcon.vue").default);
    Vue.component("v-player", require("./Common/VideoPlayer.vue").default);
    Vue.component("v-loading-plugin", require("vue-element-loading"));
    Vue.component("v-nodes", {functional: true, render: (h, ctx) => ctx.props.nodes});
    Vue.component("v-loading", require("./Common/Loading.vue").default);
    Vue.component("v-new-commentaries", require("./Common/NewCommentares.vue").default);
    Vue.component("v-bottom-action", require("./Common/BottomActions.vue").default);
    Vue.component("v-upload-image-task-report", require("./Common/UploadImageTaskReport.vue").default);
    Vue.component("v-upload-text-task-report", require("./Common/UploadTextTaskReport.vue").default);
    Vue.component("v-upload-task-status", require("./Common/UploadTaskStatus.vue").default);
    Vue.component("v-upload-report-soon", require("./Common/UploadReportSoon.vue").default);
    Vue.component("v-upload-text-or-video", require("./Common/UploadTextOrVideoReport.vue").default);
    Vue.component("v-upload-text-or-image", require("./Common/UploadTextOrImageReport.vue").default);
    Vue.component("v-my-report", require("./Common/MyReport.vue").default);
    Vue.component("v-download-file-report", require("./Common/DownloadFileReport.vue").default);
    Vue.component("v-download-file-image", require("./Common/DownloadFileAndUploadImageReport.vue").default);
    Vue.component("v-upload-tiv-report", require("./Common/UploadTextOrImageOrVideoReport.vue").default);
    Vue.component("v-upload-image-or-video", require("./Common/UploadImageOrVideoReport.vue").default);
    Vue.component("v-upload-quiz-task-report", require("./Common/UploadQuizTaskReport.vue").default);
    Vue.component("v-upload-star-quiz-task-report", require("./Common/UploadStarQuizTaskReport.vue").default);
    Vue.component("v-home-commentaries", require("./Common/HomeCommentares.vue").default);
    Vue.component("v-home-commentary", require("./Common/HomeCommentary.vue").default);
    Vue.component("v-get-task-report", require("./Common/GetTaskReport.vue").default);
    Vue.component("v-upload-video-task-report", require("./Common/UploadVideoTaskReport.vue").default);
    Vue.component("v-home-field-set-commentary", require("./Common/HomeFieldSetCommentary.vue").default);
    Vue.component("v-home-smiles-commentary", require("./Common/HomeSmilesCommentary.vue").default);
    Vue.component("v-home-make-commentary", require("./Common/HomeMakeCommentary.vue").default);
    Vue.component("v-product-info", require("./Common/ProductInfo.vue").default);
    Vue.component("v-upload-fan-task_report", require("./Common/UploadFanTaskReport.vue").default);
    Vue.component("v-direction-fun-callendar", require("./Common/DirectionFunCallendar.vue").default);
    Vue.component("v-direction-callendar-item", require("./Common/DirectionCallendarItem.vue").default);
    Vue.component("v-profile-personal-information", require("./Common/ProfilePersonalInformation.vue").default);
    Vue.component("v-profile-personal-history", require("./Common/ProfilePersonalHistory.vue").default);
    Vue.component("v-profile-personal-orders", require("./Common/ProfilePersonalOrders.vue").default);
    Vue.component("v-select", require("./Common/Select.vue").default);
    Vue.component("v-search-modal", require("./Common/SearchModal.vue").default);
    Vue.component("v-task-report", require("./Common/TaskReport.vue").default);
    Vue.component("v-file-uploader", require("./Common/FileUploader.vue").default);
    Vue.component("v-select-autocomplite", require("./Common/SelectAutocomplite.vue").default);
}
