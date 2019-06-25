<template>
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
                    <input v-model="slug" type="text" id="text-input"  disabled='disabled' name="slug" class="form-control"/>
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
</template>
<script>
export default {

    data: function(){
        return {
            name: '',
            slug: '',
            description :'',
            errors: []
        }
    },
    
    methods: {
        saveForm(){
            event.preventDefault();
            var self = this;
            // alert(this.name);
            axios.post('/api/v1/categories',{
                name: this.name,
                slug: this.slug,
                description: this.description
            })
                .then(function(res){
                    swal({
                    title: "Add category successfully!",
                    text: "Do you know continue?",
                    icon: "success",
                    buttons: true,
                    // dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (!willDelete) {
                            self.$router.push('/admints/categories');
                        }else{
                            self.name = '';
                            self.slug = '';
                            self.description = '';
                        } 
                    });
                })
                .catch(function (res){
                    if(res.response.status == 422){
                        self.errors = res.response.data.errors
                    }
                });
        }
    }
}
</script>
