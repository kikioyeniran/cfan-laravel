@extends('admin.layouts.app')

@section('content')
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">

        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Home</h2>
                    <p class="pageheader-text">Add Category</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Category</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->


        <div class="row">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Add Category</h5>
                <div class="card-body">
                    {!! Form::open(['action' => ['ArtCategoriesController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Category Name</label>
                                    {{Form::text('name', $post->name, ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Click Submit To Add</label>
                                    <br>
                                    {{Form::hidden('_method', 'PUT')}}
                                    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                                </div>

                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
         </div>
        </div>
    </div>
</div>
@endsection