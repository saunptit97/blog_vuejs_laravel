@extends('backend.index')
@section('title', 'Add Category | Admin')
@section('content')

 <div class="content">
    <div class="animated fadeIn">
        <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                  <strong>Category Form</strong>
              </div>
              <router-view name="categoriesCreate"></router-view>
                                
              <!-- <category_create></category_create> -->
            </div>


        </div>
    </div>
@endsection