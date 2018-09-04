require('./bootstrap');

window.Vue = require('vue');

// ** LOAD COMPONENTS AND REGISTER THEM **
Vue.component('add-purchase', require('./components/addpurchase.vue'));
Vue.component('add-purchase-form', require('./components/addpurchase-form.vue'));

const app = new Vue({
    el: '#app'
});
