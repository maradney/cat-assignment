<template>
  <video-player
    class="vjs-layout-x-large vjs-big-play-centered"
    ref="videoPlayer"
    :options="playerOptions"
    :playsinline="true"
    @play="onPlayerPlay($event)"
    @ended="onPlayerEnded($event)"
  ></video-player>
</template>

<script>
export default {
  props: ["examvideourl", "watchingVideo", "finishedVideo"],
  data() {
    return {
      playerOptions: {
        responsive: true,
        fluid: true,
        language: "en",
        sources: [
          {
            type: "video/mp4",
            src: this.examvideourl,
          },
        ],
        // poster: "/static/images/author.jpg",
      },
    };
  },
  created() {
    Event.$on("stop-video", () => {
      this.player.pause();
    });
  },
  mounted() {},
  computed: {
    player() {
      return this.$refs.videoPlayer.player;
    },
  },
  methods: {
    // listen event
    onPlayerPlay(player) {
      this.watchingVideo();
    },
    onPlayerEnded(player) {
      this.finishedVideo();
    },
  },
};
</script>
