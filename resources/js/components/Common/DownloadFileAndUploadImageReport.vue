<template>
    <div :class="{performance: !downloaded, upload_report: downloaded}">
        <div class="title">Скачай файл</div>
        <div class="info">
            <div v-if="!downloaded" class="quiz_start">
                <div>Нажмите, чтобы приступить к выполнению</div>
                <button type="button" @click="open" class="start_btn">Старт</button>
            </div>

            <form v-if="downloaded" class="form" @submit.stop.prevent="send">

                <v-file-uploader
                    :image="true"
                    :video="false"
                    v-model="file"
                />

                <div class="submit">
                    <button type="submit" class="submit_btn">Отправить</button>
                </div>

            </form>

            <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
        </div>
    </div>
</template>

<script>
export default {
    name: "v-download-file-image",
    props: ['task'],
    data () {
        return {
            downloaded: false,
            file: null,
        };
    },
    methods: {
        open () {
            if (this.task.report_configs) {
                window.open(this.task.report_configs.download,'_blank');
                this.downloaded=true;
            }
        },
        send() {
            if (this.file) {

                jax.user.download_file_image_report(this.task.id,this.file)
                    .then(() => {
                    })

            } else {

                "toast::error".exec("Сначала выберите файл.");
            }
        }
    }
}
</script>

<style scoped>

</style>
