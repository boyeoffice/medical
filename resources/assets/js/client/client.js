require('../bootstrap');

window.Vue = require('vue');
import App from './Client'


const app = new Vue({
    el: '#app',
    render: h => h(App)
});
