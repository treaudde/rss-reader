/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');
window.axios = require('axios');
window.VueRouter = require('vue-router');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Accept'] = 'application/json';

const rssApiUrl  = 'http://localhost:8084/api/rss-feeds';
const rssApi = require('./vue/services/rss-api').default;
const router = require('./vue/routes/router').router;
window.rssApiService = new rssApi(rssApiUrl, window.axios);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('view-feeds', require('./vue/components/ViewFeedsComponent.vue').default);
Vue.component('view-feed', require('./vue/components/ViewFeedComponent.vue').default);
Vue.component('not-found', require('./vue/components/NotFoundComponent').default);
Vue.component('loading', require('./vue/components/LoadingComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueRouter);

const app = new Vue({
   router
}).$mount('#app');
