<template>
    <div class="upload_report">
        <div class="title">Скачай файл</div>
        <div class="info">
            <form class="form" @submit.stop.prevent="send">

                <a v-if="!downloaded" :href="task.report_configs.download" @click="downloaded=true" target="_blank" class="download_link" style="color: #fab509;">
                    <v-icon icon="ic_file" />
                    <span>Скачать файл</span>
                </a>

                <v-file-uploader
                    v-if="downloaded"
                    :image="true"
                    :video="false"
                    v-model="file"
                />

                <div v-if="downloaded" class="submit">
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
        send() {
            if (this.file || !!this.comment) {

                jax.user.download_file_image_report(this.task.id,this.file)
                    .then(() => {
                    })

            } else {

                "toast::error".exec("Сначала выберите файл или напишите комментарий.");
            }
        }
    }
}
</script>

<style scoped>

</style>
