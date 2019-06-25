<template>
    <div id="app">
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Category</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">User</a></li>
                                    <li class="active">All Users</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                               <router-link :to="{name: 'createUser'}" class="btn btn-xs btn-primary mb-10">
                                        Add User
                                    </router-link>
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(user, index) in users" v-bind:key="user.id"> 
                                            <td>{{index + 1}}</td>
                                            <td>{{ user.firstname }}</td>
                                            <td>{{ user.lastname }}</td>
                                            <td>{{ user.address }}</td>
                                            <td>
                                                <router-link :to="{name: 'editUser', params: {id: user.id}}" class="btn btn-xs btn-success">
                                                    Edit
                                                </router-link>
                                                <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteEntry(user.id, index)">Delete</a>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>  
    </div>
</template>
<script>
export default {
    data: function(){
        return{
            users: []
        }
    },
    mounted() {
        var app = this;
        axios.get('/api/v1/users/')
            .then(function (resp) {
                app.users = resp.data;
            })
            .catch(function (resp) {
                console.log(resp);
                alert("Could not load categories");
            });
    },
    methods: {
        deleteEntry(id, index){
            var app = this;
            if(confirm("Do you really want to delete it?")){
                axios.delete('/api/v1/users/'+ id)
                    .then(function(resp){
                        app.users.splice(index, 1);
                    })
                    .catch(function (resp){
                        console.log(resp);
                    });
            }
        }
    }
}
</script>
