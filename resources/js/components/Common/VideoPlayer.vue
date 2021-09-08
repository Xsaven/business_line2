<template>
  <div style="padding:56.25% 0 0 0;position:relative;"><iframe :src="`https://player.vimeo.com/video/${video_id}?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;h=66c3eacff7`" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="M+M_INTRO_EDIT_SASHA_15"></iframe></div>
</template>

<script>
export default {
  props:['video_id'],
  name: "v-player",
}
</script>

<style scoped>

</style>
