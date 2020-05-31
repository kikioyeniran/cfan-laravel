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
                <p class="pageheader-text">{{$ev_theme}} Gallery</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$ev_theme}} Gallery</li>
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
                <h5 class="card-header">All {{$ev_theme}} Pictures - Click Theme to Edit Picture</h5>
            </div>
            @foreach($gallery as $post)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <!-- .card -->
                    <div class="card card-figure">
                        <!-- .card-figure -->
                        <figure class="figure">
                            <!-- .figure-img -->
                            <div class="figure-img">
                                <img class="img-fluid" src="{{ asset("storage/pictures/$post->picture")}}" alt="Product Img">
                                <div class="figure-tools">
                                    <a href="#" class="tile-circle tile-sm mr-auto">
                                                    <span class="oi-data-transfer-download"></span></a>
                                    <span class="badge badge-danger">{{$ev_theme}} images</span>
                                </div>
                                <div class="figure-action">
                                    {{-- <a h3ref="#" class="btn btn-block btn-sm btn-primary">Quick Action</a> --}}
                                    {!!Form::open(['action'=>['GalleryController@destroy', $post->gid], 'method'=> 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete Post', ['class' => 'btn btn-block btn-sm btn-danger', "onclick" => "return confirm('Are you sure you want to delete this product?');"])}}
                                    {!!Form::close()!!}
                                </div>
                            </div>
                            <!-- /.figure-img -->
                            <!-- .figure-caption -->
                            <figcaption class="figure-caption">
                                <h3 class="figure-title"><a href="/gallery/{{$post->gid}}/edit">{{$post->theme}}</a></h3>
                                <p class="text-muted mb-0">DESCRIPTION: {{$post->description}} </p>
                            </figcaption>
                            <!-- /.figure-caption -->
                        </figure>
                        <!-- /.card-figure -->
                    </div>
                    <!-- /.card -->
                </div>
            @endforeach
        </div>
        <div class="align-content-center">
            {{$gallery->links()}}
        </div>
        </div>
    </div>
</div>
@endsection