<template>
    <div id="app">
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Post</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Post</a></li>
                                    <li class="active">All Posts</li>
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
                               <router-link :to="{name: 'createPost'}" class="btn btn-xs btn-primary mb-10">
                                        Add Post
                                    </router-link>
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="width: 5%">#</th>
                                            <th style="width: 30%">Title</th>
                                            <th style="width: 30%">Description</th>
                                            <th style="width: 5%">View</th>
                                            <th style="width: 5%"> Like</th>
                                            <th style="width: 5%">Status</th>
                                            <th style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(post,index) in posts" v-bind:key="post.id">
                                            <td>{{ index + 1}}</td>
                                            <td>{{post.title}}</td>
                                            <td>{{post.description}}</td>
                                            <td>{{post.view}}</td>
                                            <td>{{post.like}}</td>
                                            <td>{{post.status}}</td>
                                            <td><router-link :to="{name: 'editPost', params: {id: post.id}}" class="btn btn-xs btn-success">
                                                    Edit
                                                </router-link>
                                                <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteEntry(post.id, index)">Delete</a></td>
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
        return {
            posts: []
        }
    },
    mounted(){
        var self = this;
        axios.get('/api/v1/posts').then(function(res){
            self.posts = res.data;
        }).catch(function(err){
            alert('Can not load all posts');
        })
    },
    methods: {
        deleteEntry(id, index){
            var app = this;
            if(confirm("Do you really want to delete it?")){
                axios.delete('/api/v1/posts/'+ id)
                    .then(function(resp){
                        app.posts.splice(index, 1);
                    })
                    .catch(function (resp){
                        console.log(resp);
                    });
            }
        }
    }
}
</script>
