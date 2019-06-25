<template>
    <div>
        <router-link :to="{name: 'createCategory'}" class="btn btn-xs btn-primary mb-10">
            Add Category
        </router-link>
         <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(category, index) in categories" v-bind:key="category.id"> 
                <td>{{index + 1}}</td>
                <td>{{ category.name }}</td>
                <td>{{ category.slug }}</td>
                <td>
                    <router-link :to="{name: 'editCategory', params: {id: category.id}}" class="btn btn-xs btn-success">
                        Edit
                    </router-link>
                    <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteEntry(category.id, index)">Delete</a>
                </td>
            </tr>
            
        </tbody>
    </table>
    </div>
   
</template>
<script>
export default {
    data: function(){
        return{
            categories: []
        }
    },
    mounted() {
        var app = this;
        axios.get('/api/v1/categories')
            .then(function (resp) {
                app.categories = resp.data;
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
                axios.delete('/api/v1/categories/'+ id)
                    .then(function(resp){
                        app.categories.splice(index, 1);
                    })
                    .catch(function (resp){
                        console.log(resp);
                    });
            }
        }
    }
}
</script>
