window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

axios.interceptors.response.use(function(response){
	return response;
}, function(error){
	if(error.response.status === 401){
		window.location = '/login'
	}
	return Promise.reject(error)
})


window.Vue = require('vue')
import App from './App'
import { router } from './router/router'
import { store } from '_/vuex/store'
Vue.use(require('vue-moment'))
window.Nprogress = require('nprogress-npm')

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
    store,
    router: router
})