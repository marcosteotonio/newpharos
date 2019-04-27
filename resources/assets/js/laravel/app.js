
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import store from './store.js';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('products-list', require('./components/ProductsList.vue'));
Vue.component('cart-dropdown', require('./components/Cart.vue'));

Vue.component('profile-list', require('./components/ProfileList.vue'));
Vue.component('profile-item', require('./components/ProfileItem.vue'));
Vue.component('profile-filter', require('./components/ProfileFilter.vue'));

const app = new Vue({
    el: '#app',
    store: new Vuex.Store(store)
});

