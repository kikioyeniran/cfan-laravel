@extends('public.layouts.app')

@section('content')
    <div class="site-section" data-aos="fade">
        <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-md-7">
            <div class="row mb-5">
                <div class="col-12 ">
                <h2 class="site-section-heading text-center">{{$cat_name}}</h2>
                </div>
            </div>
            </div>

        </div>
        <div class="row" id="lightgallery">
            @foreach($artworks as $post)
            <div
                class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item"
                data-download-url=false
                data-aos="fade" data-src="{{ asset("storage/pictures/$post->picture")}}"
                data-sub-html="<h4>{{$post->artist}}</h4><h4>{{$post->measurement}}</h4><p>{{$post->description}}</p>">
                <a href="#">
                    <img src="{{ asset("storage/pictures/$post->picture")}}" alt="image" class="img-fluid" style="max-height: 250px;">
                </a>
            </div>
            @endforeach
        </div>
        </div>
    </div>
@endsection