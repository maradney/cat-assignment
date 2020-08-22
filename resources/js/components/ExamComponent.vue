<template>
  <div class="container" v-if="exam">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <!-- Exams Modal - Title-->
        <h2
          class="portfolio-modal-title text-secondary text-uppercase mb-0"
          :id="'examsModal' + exam.id + 'Label'"
        >{{ exam.name }}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon">
            <i class="fas fa-star"></i>
          </div>
          <div class="divider-custom-line"></div>
        </div>
        <p class="mb-5">Watch the video carefully and answer the following questions.</p>
        <!-- Exams Modal - Image-->
        <video-testing-component
          :examvideourl="examvideourl"
          :watchingVideo="watchingVideo"
          :finishedVideo="finishedVideo"
          class="mb-5"
          style="min-height: 350px;min-width: 100%;"
        ></video-testing-component>
        <!-- Exams Modal - Text-->
        <form method="POST">
          <div v-for="(question, index) in exam.questions" v-bind:key="index">
            <h3 class="float-left">{{ question.question }}</h3>
            <div class="clearfix"></div>
            <div class="form-row">
              <div
                class="form-group col-md-4"
                v-for="(answer) in question.answers"
                v-bind:key="answer"
              >
                <label :for="'exams-form-question' + index + '-ans1'">
                  <input
                    type="radio"
                    :name="'question[' + index + ']'"
                    :value="answer"
                    v-on:change="selectAnswer(question.id, answer)"
                  />
                  {{ answer }}
                </label>
              </div>
            </div>
          </div>
          <button class="btn btn-primary" @click.prevent="submitAnswers();">
            <i class="far fa-circle"></i>
            Submit answers
          </button>
          <button class="btn btn-warning" data-dismiss="modal" ref="closeModalBTN">
            <i class="fas fa-times fa-fw"></i>
            Close Window
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["exam", "examvideourl"],
  data() {
    return {
      videoStarted: false,
      videoFinished: false,
      answers: [],
    };
  },
  mounted() {},
  created() {},
  methods: {
    watchingVideo() {
      this.videoStarted = true;
    },
    finishedVideo() {
      this.videoFinished = true;
    },
    selectAnswer(id, answer) {
      this.answers.push({ id, answer });
    },
    submitAnswers() {
      /**
       * Hide loading screen
       */
      Event.$emit("show-loading-screen");
      const data = {
        videoStarted: this.videoStarted,
        videoFinished: this.videoFinished,
        answers: this.answers,
      };
      const examId = this.exam.id;
      axios
        .post("/answers/" + examId, data)
        .catch((error) => {
          if (error.response) {
            // Request made and server responded
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);

            switch (error.response.status) {
              case 401:
                this.$swal(
                  "Wait a minute!",
                  "You need to login first!",
                  "error"
                );
                break;
              default:
                this.$swal("Oops...", "Something went wrong!", "error");
                break;
            }
          } else if (error.request) {
            // The request was made but no response was received
            console.log(error.request);
          } else {
            // Something happened in setting up the request that triggered an Error
            console.log("Error", error.message);
          }
        })
        .then((response) => {
          if (response && response.data.message) {
            this.$swal(response.data.message);
          }
        })
        .finally(() => {
          this.$refs.closeModalBTN.click();
          /**
           * Hide loading screen
           */
          Event.$emit("hide-loading-screen");
          Event.$emit("stop-video");
        });
    },
  },
};
</script>
