<template>
 <div id="app">
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>User</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">User</a></li>
                                    <li class="active">Edit User</li>
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
                            <!-- <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div> -->
                            <div class="card-body">
                                <div class="card-body card-block">
                                    <form action="/api/v1/categories" method="post" v-on:submit="saveForm()" enctype="multipart/form-data" class="form-horizontal">
                                        <!-- {{ csrf_field() }} -->
                                        <div class="row form-group" style="height: 60px">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                                            <div class="col-12 col-md-9">
                                                <input v-model="name" type="text" id="text-input" name="name" class="form-control"/>
                                                <small v-if="errors.name" class="error">{{errors.name[0]}}</small>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Slug</label></div>
                                            <div class="col-12 col-md-9">
                                                <input v-model="slug" type="text" id="text-input" name="slug" class="form-control"/>
                                                <small class="form-text text-muted">It will auto generate</small>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
                                            <div class="col-12 col-md-9">
                                                <input v-model="description" type="text" id="text-input" name="description" class="form-control"/>
                                            </div>
                                        </div>
                                        
                                        <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
         </div>    
    </div>
     
    
</template>
<script>
export default {
    data: function(){
        return {
            id: null,
            name: '',
            slug: '',
            description :'',
            errors: []
        }
    },
    mounted() {
        let app = this;
        let id = app.$route.params.id;
        app.id = id;
        axios.get('/api/v1/categories/' + id).then(function(res){
            app.name = res.data.name;
            app.slug = res.data.slug;
            app.description = res.data.description;
        });
    },
    methods: {
        saveForm(){
            event.preventDefault();
            var self = this;
          
            axios.patch('/api/v1/categories/' + self.id, {
                name: this.name,
                slug: this.slug,
                description: this.description
            })
                .then(function (resp) {
                    swal({
                        title: "Update category successfully!",
                        icon: "success",
                    });
                     self.$router.push('/admints/categories');
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not create your company");
                });
        }
    }
}
</script>
