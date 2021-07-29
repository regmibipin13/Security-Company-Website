
require('./bootstrap');

window.Vue = require('vue').default;

import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(VueToast, {
    position:'top-right'
});

Vue.component('employee', require('./components/Employee.vue').default);
Vue.component('company', require('./components/Company.vue').default);


const app = new Vue({
    el: '#app',
    methods:{
        success(message, options = {}) {
            Vue.$toast.success(message, options);
        },
        error(message, options = {}) {
            Vue.$toast.error(message, options);
        },
        warning(message, options = {}) {
            Vue.$toast.warning(message, options);
        },

    }
});
