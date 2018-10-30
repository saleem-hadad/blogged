require('./bootsrap');
require('./argon');

import Vue from "vue";

Vue.config.productionTip = false;
const noDelimiter = {replace: () => '(?!x)x'};

const app = new Vue({
  el: '#app',
  delimiters: [noDelimiter, noDelimiter]
});