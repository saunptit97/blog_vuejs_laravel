require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
window.Vue.use(VueRouter);

import CategoriesIndex from './components/category/CategoryIndex.vue';
import CategoriesCreate from './components/category/CategoryCreate.vue';
import CategoriesEdit from './components/category/CategoryEdit.vue';
import UsersIndex from './components/user/UserIndex.vue';
import HomeIndex from './components/HomeIndex.vue';
import UsersCreate from './components/user/UserCreate.vue';
import UsersEdit from './components/user/UserEdit.vue';
// Vue.component('category_create', CategoriesCreate);

// Vue.component('category_index',CategoriesIndex);


const routes = [
    { path: '', component: HomeIndex, name: 'homeIndex'},
    { path: '/admints/categories', component: CategoriesIndex, name: 'categoryIndex'},
    { path: '/admints/categories/create', component: CategoriesCreate, name: 'createCategory'},
    { path: '/admints/categories/edit/:id', component: CategoriesEdit, name: 'editCategory'},
    { path: '/admints/users', component: UsersIndex, name : 'usersIndex'},
    { path: '/admints/users/create', component: UsersCreate, name: 'createUser'},
    { path: '/admints/users/edit/:id', component: UsersEdit, name: 'editUser'}
]

// const app = new Vue({
//     el: '#app',
// });



const router = new VueRouter({ 
    mode: 'history',
    routes 
})

const app = new Vue({ router }).$mount('#app')