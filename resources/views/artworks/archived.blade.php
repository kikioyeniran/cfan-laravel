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
                    <p class="pageheader-text">Archived Art Works</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Archived Art Works</li>
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
                <h5 class="card-header">All Archived Art Works - Click Name to Edit Art Work</h5>
            </div>
            @foreach($artworks as $post)
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
                                    <span class="badge badge-danger">{{$post->category}}</span>
                                </div>
                                <div class="figure-action">
                                    {{-- <a h3ref="#" class="btn btn-block btn-sm btn-primary">Quick Action</a> --}}
                                    {{-- {!!Form::open(['action'=>['Web\ProductController@destroy', $post->id], 'method'=> 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete Post', ['class' => 'btn btn-block btn-sm btn-danger', "onclick" => "return confirm('Are you sure you want to delete this product?');"])}}
                                    {!!Form::close()!!} --}}
                                <a href="/artworks/restore/{{$post->aid}}" class ='btn btn-block btn-sm btn-danger' onclick="return confirm('Are you sure you want to restore this art work?');" >Restore Art Work</a>
                                </div>
                            </div>
                            <!-- /.figure-img -->
                            <!-- .figure-caption -->
                            <figcaption class="figure-caption">
                                <h3 class="figure-title"><a href="/artworks/{{$post->aid}}/edit">{{$post->category}}</a></h3>
                                {{-- <p class="text-muted mb-0">CATEGORY: {{$post->category}} </p> --}}
                                <p class="text-muted mb-0">ARTIST: {{$post->artist}} </p>
                                <p class="text-muted mb-0">MEASUREMENT: {{$post->measurement}} </p>
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
            {{$artworks->links()}}
        </div>




        </div>
    </div>
</div>
@endsection