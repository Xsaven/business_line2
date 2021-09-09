<template>
    <div class="line files" ref="files" v-if="video || image">

        <div class="step choose field" style="display: block">
            <input type="file" name="file" id="file" ref="file" @change="handleUpload" :accept="accept">
            <label for="file">
                <v-icon icon="ic_attachment" />
                <span>Прикрепить <span v-if="video && image">фото/видео</span><span v-if="video">видео</span><span v-if="image">фото</span></span>

                <div class="rules" v-if="rules" v-html="rules"></div>
            </label>
        </div>

        <div class="step file_error" style="display: none;">
            <v-icon icon="ic_error" />

            <div v-if="error_format">Неверный формат файла!</div>
            <div v-else-if="error_system">Системная ошибка загрузки файла!</div>
            <div v-else-if="error_big">Файл слишком большой. <a href="/" target="_blank">Инструкция по сжатию файла</a></div>

            <button type="button" class="close_btn" @click="close_error">
                <v-icon icon="ic_delete" />
            </button>
        </div>

        <div class="step loading" style="display: none;" v-if="file">
            <div class="row">
                <div class="icon">
                    <svg><use xlink:href="/images/sprite.svg#ic_file2"></use></svg>
                </div>

                <div>
                    <div class="name">{{file.name}}</div>

                    <div class="progress">
                        <div class="bar" :style="`width: ${loading}%;`"></div>
                    </div>

                    <div class="size">
                        <span class="upload">{{loaded}} Мб</span> из
                        <span class="total">{{total}} Мб</span>
                        <span class="percents">{{loading}}% загружено</span>
                    </div>
                </div>
            </div>

            <button type="button" class="cancel_btn" v-if="xhr" @click="abort">Отмена</button>
        </div>

        <div class="step selected" style="display: none;" v-if="file">
            <div class="row">
                <div class="icon">
                    <svg><use xlink:href="/images/sprite.svg#ic_file2"></use></svg>
                </div>

                <div>
                    <div class="name">{{file.name}}</div>

                    <div class="size">
                        <span class="total">{{total}} Мб</span>
                        <span class="percents">Файл загружен</span>
                    </div>
                </div>
            </div>

            <button type="button" class="delete_btn" @click="fileRemove">Удалить</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "v-file-uploader",
        props: {
            image: {default: false},
            video: {default: false},
            value: {},
        },
        data () {
            return {
                allowed_image_mb: 10,
                allowed_video_mb: 20,
                image_types: ['image/jpeg', 'image/png'],
                video_types: ['video/quicktime', 'video/mp4', 'video/mpeg'],
                error_format: false,
                error_big: false,
                error_system: false,
                loading: 0,
                loaded: 0,
                total: 0,
                file: null,
                filename: this.value,
                xhr: null,
            };
        },
        mounted () {},
        computed: {
            accept () {
                let mime = [];
                if (this.image) mime.push(...this.image_types);
                if (this.video) mime.push(...this.video_types);
                return mime.join(", ");
            },
            rules () {
                let rules = [];
                if (this.image) rules.push(`jpg, jpeg, png до ${this.allowed_image_mb} МБ`);
                if (this.video) rules.push(`mov, mp4, mpeg, mpg до ${this.allowed_video_mb} МБ`);
                return rules.join("<br>");
            }
        },
        watch: {},
        methods: {
            fileRemove (index) {
                this.file = null;
                this.$refs.file.value = "";
                jax.user.drop_file(this.filename);
                this.to_step('choose');
                this.$emit('upload_drop');
            },
            handleUpload() {
                if (this.$refs.file && this.$refs.file.files[0]) {
                    let file = this.$refs.file.files[0];
                    if (this.is_image(file)) {
                        if (this.is_image_size(file)) {
                            this.fireUpload(file);
                        } else {
                            this.error_big = true;
                            this.to_step('file_error');
                        }
                    } else if (this.is_video(file)) {
                        if (this.is_video_size(file)) {
                            this.fireUpload(file);
                        } else {
                            this.error_big = true;
                            this.to_step('file_error');
                        }
                    } else {
                        this.error_format = true;
                        this.to_step('file_error');
                    }
                }
            },
            fireUpload (file) {
                this.$emit('upload_start');
                this.to_step('loading');
                this.file = file;
                this.total = ljs.help.number_format(file.size / 1048576, 2);
                ljs.onetime(() => {
                    jax.progress(this.progress.bind(this))
                        .params({file})
                        .user
                        .upload_file()
                        .then(({result, file}) => {
                            if (result && file) {
                                this.$emit('input', file);
                                this.filename = file;
                                this.$emit('upload_success');
                                this.to_step('selected');
                            } else {
                                this.error_system = true;
                                this.to_step('file_error');
                            }
                            this.$emit('upload_finish');
                            this.xhr = null;
                        }).catch(() => {
                            this.$emit('upload_error');
                            ljs.onetime(() => {
                                this.error_system = true;
                                this.to_step('file_error');
                            }, 200)
                        });
                }, 301)
            },
            progress (e, xhr) {
                this.xhr = xhr;
                this.loading = Math.round((e.loaded / e.total) * 100);
                this.loaded = ljs.help.number_format(e.loaded / 1048576, 2);
                this.total = ljs.help.number_format(e.total / 1048576, 2);
            },
            abort () {
                if (this.xhr) this.xhr.abort();
                this.xhr = null;
                this.file = null;
                this.$refs.file.value = "";
                this.to_step('choose');
                this.$emit('upload_drop');
            },


            is_image (file) {
                return this.image_types.indexOf(file.type) !== -1;

            },
            is_video (file) {
                return this.video_types.indexOf(file.type) !== -1;
            },
            is_image_size (file) {
                return file.size <= this.allowed_image_mb*1024*1024;
            },
            is_video_size (file) {
                return file.size <= this.allowed_video_mb*1024*1024;
            },
            to_step (className) {
                let files = $(this.$refs.files)
                files.find('.step').hide()
                ljs.onetime(() => files.find('.'+className).fadeIn(300), 100)
            },
            close_error () {
                this.error_big = false;
                this.error_format = false;
                this.error_system = false;
                this.$refs.file.value = "";
                this.to_step('choose');
            }
        }
    }
</script>
