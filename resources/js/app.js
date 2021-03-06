/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./jQuery/script");

window.Vue = require('vue');

//axios
import axios from 'axios'
Vue.prototype.$http = axios;

//pagination
import Paginate from 'vuejs-paginate'
Vue.component('paginate', Paginate);

//scroll
var VueScrollTo = require('vue-scrollto');
Vue.use(VueScrollTo)

require("./plugins/scroll");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//トップページ
Vue.component('toppage-component', require('./components/ToppageComponent.vue').default);

//メインページ
Vue.component('mainpage-component', require('./components/MainpageComponent.vue').default);

//Googlenewsページ
Vue.component('newspage-component', require('./components/NewspageComponent.vue').default);

//Twitterアカウントページ
Vue.component('accountpage-component', require('./components/AccountpageComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
