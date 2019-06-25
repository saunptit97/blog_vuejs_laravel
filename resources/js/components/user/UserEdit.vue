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
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <div class="card-body card-block">
                                    <form method="post" v-on:submit="saveForm()" enctype="multipart/form-data" class="form-horizontal">
                                        <label style="margin: 20px 0px"><b>User Information</b></label>
                                        <div class="row form-group" style="height: 60px;"> 
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">First name</label></div>
                                            <div class="col-12 col-md-9">
                                                <input v-model="firstname" type="test" id="text-input" name="firstname" class="form-control"/>
                                            
                                            </div>
                                        </div>
                                        <div class="row form-group" style="height: 60px;">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Last name</label></div>
                                            <div class="col-12 col-md-9">
                                                <input v-model="lastname" type="text" id="text-input" name="lastname" class="form-control"/>
                                            
                                            </div>
                                        </div>
                                        <div class="row form-group" style="height: 60px;">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
                                            <div class="col-12 col-md-9">
                                                <input v-model="address" type="text" id="text-input" name="address" class="form-control"/>
                                            
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
            firstname: '',
            lastname: '',
            address: ''
        }
    },
    mounted(){
        var self = this;
        var id = self.$route.params.id
        axios.get('/api/v1/users/' + id)
        .then(function(res){
            self.firstname = res.data.firstname;
            self.lastname = res.data.lastname;
            self.address = res.data.address;
            self.id = res.data.id;
        });
    },
    methods: {
        saveForm(){
            event.preventDefault();
            var self = this;
            axios.patch('/api/v1/users/' +  self.id,{
                firstname: self.firstname,
                lastname: self.lastname,
                address: self.address
            }).then(function(res){
               swal({
                    title: "Edit user successfully!",
                    text: "Do you know continue?",
                    icon: "success",
                    buttons: true,
                    // dangerMode: true,
                    })
                    .then((willContinuce) => {
                        if (!willContinuce) {
                            self.$router.push('/admints/users');
                        }
                    });
            }).catch(function(res){
                console.log(res);
            })
        }
    }
    
}
</script>
