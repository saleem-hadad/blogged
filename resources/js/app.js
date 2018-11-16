require('./bootsrap');
require('./argon');

import Vue from "vue";
import router from "./router";
import Article from './Article';
import Toasted from 'vue-toasted';
import 'vue-loaders/dist/vue-loaders.css';
import { BallBeatLoader } from 'vue-loaders';
import BackToTop from "./components/BackToTop";

Vue.config.productionTip = false;
Vue.use(Toasted, {
  router,
  theme: 'blogged',
  position: 'bottom-right',
  duration: 5000,
})

Vue.component(BackToTop.name, BackToTop);
Vue.component(BallBeatLoader.name, BallBeatLoader);

const noDelimiter = {replace: () => '(?!x)x'};

new Vue({
  el: '#app',
  delimiters: [noDelimiter, noDelimiter],
  router,
  mounted() {
    Article.parse();
  }
});

ga('set', 'page', router.currentRoute.path);
ga('send', 'pageview');

router.afterEach(( to, from ) => {
  ga('set', 'page', to.path);
  ga('send', 'pageview');
});