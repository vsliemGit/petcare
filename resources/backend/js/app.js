require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);
Vue.use(VueAxios, axios)

Vue.component('vue-table', require('./components/listProducts.vue').default);

const app = new Vue({
    el: '#app',
    data: {
        message: 'Test vue Boostrap'
      }
});

