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
  data() {
    return {
      playerOptions: {
        responsive: true,
        fluid: true,
        language: "en",
        sources: [
          {
            type: "video/mp4",
            src:
              "/videos/[ThePruld] Im into the abyss.mp4",
          },
        ],
        // poster: "/static/images/author.jpg",
      },
    };
  },
  mounted() {
    // console.log("This is current player instance object", this.player);
  },
  computed: {
    player() {
      return this.$refs.videoPlayer.player;
    },
  },
  methods: {
    // listen event
    onPlayerPlay(player) {
      console.log("player play!");
    },
    onPlayerEnded(player) {
      console.log('player ended!')
    },
  },
};
</script>
