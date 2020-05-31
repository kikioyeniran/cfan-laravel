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
                    <p class="pageheader-text">Add Art Work</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Art Work</li>
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
                <h5 class="card-header">Add Art Work</h5>
                <div class="card-body">
                    {!! Form::open(['action' => 'ArtWorksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Art Category</label>
                                      {{ Form::select('category', $catOptions, null, ['class'=>'form-control form-control-lg', 'id'=> 'category']) }}
                                </div>
                                <div class="form-group">
                                    <label for="inputText4" class="col-form-label">Artist</label>
                                    {{ Form::select('artist', $artOptions, null, ['class'=>'form-control form-control-lg']) }}
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Measurement</label>
                                    {{Form::text('measurement', '', ['class' => 'form-control'])}}
                                </div>
                                <label for="inputText3" class="col-form-label">Art Work Image</label>
                                <div class="custom-file mb-3">
                                    {{Form::file('art_img', ['class'=> 'custom-file-input'])}}
                                    <br/>
                                    <label class="custom-file-label" for="customFile">Select Art Work Image</label>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Art Description</label>
                                    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Art Description...', 'rows' => 2])}}
                                </div>
                                {{Form::submit('Submit', ['class'=> 'btn btn-primary', 'id'=> 'prodSub'])}}
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