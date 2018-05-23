require('../bootstrap');

window.Vue = require('vue');
import App from '../App'
import Router from './router'
import { store } from './vuex/store'
Vue.use(require('vue-moment'))

window.toastr = require('toastr/build/toastr.min.js');
window.innerHeight = 800;

window.toastr.options = {
    positionClass: "toast-top-center",
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
}

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: Router,
    store
});
