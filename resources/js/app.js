/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import VueSweetalert2 from 'vue-sweetalert2';
import VueVideoPlayer from 'vue-video-player';
import 'video.js/dist/video-js.css';

Vue.use(VueSweetalert2);
Vue.use(VueVideoPlayer);
window.Vue = Vue;
window.Event = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('exam-component', require('./components/ExamComponent.vue').default);
Vue.component('video-testing-component', require('./components/VideoTestingComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data() {
        return {
            loading_screen : false,
            exams_count : 6, // can use this as a prop later instead
        }
    },
    mounted() {
        for (let i = 0; i < this.exams_count; i++) {
            $(this.$refs["vuemodal" + i]).on("hidden.bs.modal", () => {
                Event.$emit("hide-loading-screen");
                Event.$emit("stop-video");
            });
        }
    },
    created() {
        var vm = this;
        Event.$on('show-loading-screen' , function() {
            vm.loading_screen = true;
        });
        Event.$on('hide-loading-screen' , function() {
            vm.loading_screen = false;
        });
    },
});
