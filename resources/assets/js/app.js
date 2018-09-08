require('./bootstrap');

window.Vue = require('vue');
import VeeValidate from 'vee-validate';
import Buefy from 'buefy';

// ** LOAD COMPONENTS AND REGISTER THEM **
Vue.component('add-purchase', require('./components/addpurchase.vue'));
Vue.component('add-purchase-form', require('./components/addpurchase-form.vue'));
Vue.use(VeeValidate);
Vue.use(Buefy);

const app = new Vue({
    el: '#app',
    methods: {
    	clientDelete(client_class) {
    		this.$dialog.confirm({
                title: 'Deleting client',
                message: 'Are you sure you want to <b>delete</b> this client? This action cannot be undone.',
                confirmText: 'Delete Client',
                type: 'is-danger',
                onConfirm: () => {
                	document.querySelector('.' + client_class).submit();
                }
            });
    	}
    }
});
