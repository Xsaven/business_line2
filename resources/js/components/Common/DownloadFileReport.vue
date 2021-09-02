<template>
  <div class="upload_report">
    <div class="title">Скачай файл</div>
    <div class="info">
      <form action="" class="form">
        <div class="line files">
          <div class="selected">
            <div  class="file">
              <v-icon icon="ic_file" />
              <a :href="'/images/bg_performance.svg'" class="name" style="color: #fab501">qweqwe</a>
            </div>
          </div>
        </div>
      </form>

      <img data-src="/images/bg_performance.svg" alt="" class="bg lozad">
    </div>
  </div>
</template>

<script>
export default {
  name: "v-download-file-report",
  methods: {
    download() {
      console.log(1);
    }
  }
}
</script>

<style scoped>

</style>
