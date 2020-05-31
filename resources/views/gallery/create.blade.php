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
                    <p class="pageheader-text">Add Image to Gallery</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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
                <h5 class="card-header">Add Image to Gallery</h5>
                <div class="card-body">
                    {!! Form::open(['action' => 'GalleryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Select C.F.A.N Event</label>
                                      {{ Form::select('event', $evOptions, null, ['class'=>'form-control form-control-lg', 'id'=> 'category']) }}
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <label for="inputText3" class="col-form-label">Select Image for this event</label>
                                <div class="custom-file mb-3">
                                    {{-- {{Form::file('gall_img', ['class'=> 'custom-file-input'])}} --}}
                                    {{Form::file('gall_img[]', ['class'=> 'custom-file-input', 'multiple'])}}
                                    <br/>
                                    <label class="custom-file-label" for="customFile">Select Picture</label>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Description</label>
                                    {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description...', 'rows' => 2])}}
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