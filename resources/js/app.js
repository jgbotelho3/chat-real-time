import Vue from "vue";

require('./bootstrap');
import store from './store/store';

window.Vue = require('vue').default;

Vue.component('chat', require('./components/chat/Chat').default);
Vue.component('users', require('./components/chat/Users').default);
Vue.component('messages', require('./components/chat/Messages').default);

const app = new Vue({
    el: '#app',
    store
});
