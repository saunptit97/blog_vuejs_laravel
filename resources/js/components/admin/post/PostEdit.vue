<template>
    <div id="app">
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Edit Post</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Post</a></li>
                                    <li class="active">Post Create</li>
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
                                    <form method="post" id="edit_post" v-on:submit="saveForm()" enctype="multipart/form-data" class="form-horizontal">
                                        <!-- {{ csrf_field() }} -->
                                        <!-- <label id="label" style="margin: 20px 0px"><b>Account Information</b></label> -->
                                        <div class="row form-group" style="height: 60px">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label></div>
                                            <div class="col-12 col-md-9">
                                                <input v-model="title" type="text" id="text-input" name="title" class="form-control"/>
                                                <small v-if="errors.title" class="error">{{errors.title[0]}}</small>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="height: 60px">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Description</label></div>
                                            <div class="col-12 col-md-9">
                                                <input v-model="description" type="text" id="text-input" name="description" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="height: 60px">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category</label></div>
                                            <div class="col-12 col-md-9">
                                                <select v-model="id_category">
                                                    
                                                    <option v-for="category in categories" v-bind:key="category.id" :value="category.id">{{category.name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="row form-group" style="height: 60px">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Publish</label></div>
                                            <div class="col-12 col-md-9">
                                                <select v-model="status">
                                                    <option value="1">Publish</option>
                                                    <option value="0">Draf</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group" style="height: 60px">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Feature</label></div>
                                            <div class="col-12 col-md-9">
                                                <select v-model="feature">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group" >
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Image</label></div>
                                            <div class="col-12 col-md-9">
                                                <img id="image" src="/images/no_image.png" style="width: 200px; height: auto; margin-bottom: 10px;"/>
                                                <input type="file" name="image" v-on:change="onImageChange" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group" >
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Content</label></div>
                                            <div class="col-12 col-md-9">
                                                <vue-ckeditor v-model="content" :config="config" />
                                                <small v-if="errors.content" class="error">{{errors.content[0]}}</small>
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
    components: { VueCkeditor },
    data: function(){
        return {
            id: null,
            title: '',
            description: '',
            content: '',
            id_category: null,
            feature: 0,
            status: 0,
            categories: [],
            errors: [],
            image: '',
            config: {
                toolbar:  [
                    { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
                    { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                    { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
                    { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
                    '/',
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
                    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                    { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
                    '/',
                    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
                    { name: 'about', items: [ 'About' ] }
                    ],
                height: 300
            }
        }
    },
    mounted(){
        var self = this;
        axios.get('/api/v1/categories').then(function(res){
            self.categories = res.data;
        });
        var id = this.$route.params.id;
        self.id = id;
        axios.get('/api/v1/posts/' + id).then(function(res){
            self.title = res.data.title;
            self.description = res.data.description;
            self.content = res.data.content;
            self.id_category = res.data.id_category;
            self.image = res.data.image;
            self.status = res.data.status;
            self.feature = res.data.feature;
            if(self.image != ''){
                $("#image").attr('src', '/upload/' + self.image);
            }
        });
    },
    methods: {
        saveForm(){
            event.preventDefault();
            var self = this;
            alert(self.title);
            const config = {
                headers: { 
                    // 'content-type': 'multipart/form-data',
                    'content-type': 'application/x-www-form-urlencoded'    
                }
            }
            // var form = $("#edit_post");
            let formData = new FormData();
            formData.append('_method', 'PUT')
            formData.append('title', this.title);
            formData.append('description', this.description);
            formData.append('content', this.content);
            formData.append('id_category', this.id_category);
            formData.append('image', this.image);
             formData.append('feature', this.feature);
            formData.append('status', this.status);
            // console.log(formData);
            axios.post('/api/v1/posts/' + self.id,formData, config).then(function(res){
                    swal({
                    title: "Add category successfully!",
                    text: "Do you know continue?",
                    icon: "success",
                    buttons: true,
                    // dangerMode: true,
                    })
                    .then((willContinuce) => {
                        if (!willContinuce) {
                            console.log(res);
                            self.$router.push('/admints/posts');
                        }else{
                            self.title = '';
                            self.content = '';
                            self.description = '';
                            self.id_category = null;
                        } 
                    });
                })
                .catch(function (res){
                    if(res.response.status == 422){
                        self.errors = res.response.data.errors
                    }
                });

        },
        onImageChange(e) {
            this.image = e.target.files[0];
            var self = this;
            let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
        createImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                $("#image").attr('src', e.target.result);
            };
        
            reader.readAsDataURL(file);
        }
    }
}
</script>
