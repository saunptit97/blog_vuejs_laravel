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
                                        <label id="label" style="margin: 20px 0px"><b>Account Information</b></label>
                                        <div class="row form-group" style="height: 60px">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                            <div class="col-12 col-md-9">
                                                <input v-model="email" type="text" id="text-input" name="email" class="form-control"/>
                                                <small v-if="errors.email" class="error">{{errors.email[0]}}</small>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                                            <div class="col-12 col-md-9">
                                                <input v-model="password" type="password" id="text-input" name="password" class="form-control"/>
                                                <small class="form-text text-muted">Greater than 8 characters and at least one uppercase and lowercase letter</small>
                                                <small v-if="errors.password" class="error">{{errors.password[0]}}</small>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Confirm Password</label></div>
                                            <div class="col-12 col-md-9">
                                                <input v-model="confirm_password" type="password" id="text-input" name="confirm_password" class="form-control"/>
                                                <small v-if="errors.confirm_password" class="error">{{errors.confirm_password[0]}}</small>
                                            </div>
                                        </div>
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
           email: '',
           password: '',
           confirm_password: '',
           firstname: '',
           lastname: '',
           address: '',
           errors: []
       }
    },
    methods : {
        saveForm(){
            event.preventDefault();
            var self = this;
            axios.post('/api/v1/account', {
                email: self.email,
                password: self.password,
                confirm_password: self.confirm_password,
                firstname: self.firstname,
                lastname: self.lastname,
                address: self.address
            }).then(function(res){
                    swal({
                    title: "Add user successfully!",
                    text: "Do you know continue?",
                    icon: "success",
                    buttons: true,
                    // dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (!willDelete) {
                            self.$router.push('/admints/users');
                        }else{
                            self.email = '';
                            self.password = '';
                            self.confirm_password = '';
                            self.firstname = '',
                            self.lastname = '',
                            self.address = ''
                        } 
                    });
                })
                .catch(function (res){
                    if(res.response.status == 422){
                        console.log(res.response.data.errors);
                        self.errors = res.response.data.errors
                    }
                });
        }
    }
}
</script>
