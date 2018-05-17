require('../bootstrap');

window.Vue = require('vue');
import App from '../App'
import Router from './router'
import { store } from './vuex/store'


const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: Router,
    store
});
