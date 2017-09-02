
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('messages', require('./components/Messages.vue'));
Vue.component('messagecomposer', require('./components/MessageComposer.vue'));
Vue.component('user-update-activity', require('./components/User.vue'));
Vue.component('user-profile', require('./components/UserProfile.vue'));
Vue.component('active-users', require('./components/ActiveUsers.vue'));

const app = new Vue({
    el: '#app'
});
