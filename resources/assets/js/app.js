require('./bootstrap');

window.Vue = require('vue');
import VeeValidate from 'vee-validate';

// ** LOAD COMPONENTS AND REGISTER THEM **
Vue.component('add-purchase', require('./components/addpurchase.vue'));
Vue.component('add-purchase-form', require('./components/addpurchase-form.vue'));
Vue.use(VeeValidate);

const app = new Vue({
    el: '#app'
});
