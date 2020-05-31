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
                    <p class="pageheader-text">Edit Event</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Event</li>
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
                <h5 class="card-header">Add Event</h5>
                <div class="card-body">
                    {!! Form::open(['action' => ['EventsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Theme</label>
                                    {{Form::text('theme', $post->theme, ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Location</label>
                                    {{Form::text('location', $post->location, ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Select Date</label>
                                        {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control datetimepicker-input', 'data-target' => '#datetimepicker10'])}}
                                </div>
                                <label for="inputText3" class="col-form-label">Event Image</label>
                                <div class="custom-file mb-3">
                                    {{Form::file('event_img', ['class'=> 'custom-file-input'])}}
                                    <br/>
                                    <label class="custom-file-label" for="customFile">Select Picture</label>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Event Description</label>
                                    {{Form::textarea('description', $post->description, ['class' => 'form-control', 'placeholder' => 'Event Description..', 'rows' => 2])}}
                                </div>
                                {{Form::hidden('_method', 'PUT')}}
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