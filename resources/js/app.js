require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
window.Vue.use(VueRouter);
import VueCkeditor from 'vue-ckeditor2';

import {routes} from './routes'

const router = new VueRouter({ 
    mode: 'history',
    routes 
})
Vue.use(VueCkeditor);
const app = new Vue({ router }).$mount('#app')