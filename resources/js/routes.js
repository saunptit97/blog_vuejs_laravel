import CategoriesIndex from './components/admin/category/CategoryIndex.vue';
import CategoriesCreate from './components/admin/category/CategoryCreate.vue';
import CategoriesEdit from './components/admin/category/CategoryEdit.vue';
import UsersIndex from './components/admin/user/UserIndex.vue';
import HomeIndex from './components/admin/HomeIndex.vue';
import UsersCreate from './components/admin/user/UserCreate.vue';
import UsersEdit from './components/admin/user/UserEdit.vue';
import PostCreate from './components/admin/post/PostCreate.vue';
import PostIndex from './components/admin/post/PostIndex.vue';
import PostEdit from './components/admin/post/PostEdit.vue';
import Information from './components/admin/Information.vue';
export const routes = [

    { path: '/admints', component: HomeIndex, name: 'homeIndex',meta:{title : 'Admin | Dashboard '}},
    { path: '/admints/categories', component: CategoriesIndex, name: 'categoryIndex' ,meta:{title : 'Admin| Category'}},
    { path: '/admints/categories/create', component: CategoriesCreate, name: 'createCategory'},
    { path: '/admints/categories/edit/:id', component: CategoriesEdit, name: 'editCategory'},
    { path: '/admints/users', component: UsersIndex, name : 'usersIndex'},
    { path: '/admints/users/create', component: UsersCreate, name: 'createUser'},
    { path: '/admints/users/edit/:id', component: UsersEdit, name: 'editUser'},
    { path: '/admints/posts', component: PostIndex, name: 'postIndex'},
    { path: '/admints/posts/create', component:PostCreate, name: 'createPost' },
    { path: '/admints/posts/edit/:id', component:PostEdit, name: 'editPost'},
    { path: '/admints/information', component: Information }
]