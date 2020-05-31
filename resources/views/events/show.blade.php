@extends('public.layouts.app')

@section('content')
<div class="" data-aos="fade">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @foreach ($event as $post)
                    <div class="row mb-5 site-section">
                        <div class="col-12 ">
                            <h2 class="site-section-heading text-center">{{ strtoupper($post->theme)}}</h2>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-7">
                            <img src="{{ asset('/storage/pictures/' . $post->picture)}}" alt="Images" class="img-fluid">
                        </div>
                        <div class="col-md-4 ml-auto">
                            <h3>{{ strtoupper($post->theme)}}</h3>
                            <h3>{{$post->location}}</h3>
                            <h3>{{$post->date}}</h3>
                            <p>{!! $post->description !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="row mb-5">
                    <div class="col-12 ">
                    <h2 class="site-section-heading text-center">Event(Exhibition) Images</h2>
                    </div>
                </div>
            </div>

        </div>
        <div class="row" id="lightgallery">
            @foreach($gallery as $post)
            <div
                class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item"
                data-download-url=false
                data-aos="fade" data-src="{{ asset("storage/pictures/$post->picture")}}"
                data-sub-html="<h4>{{$post->description}}</h4>">
                <a href="#">
                    <img src="{{ asset("storage/pictures/$post->picture")}}" alt="image" class="img-fluid" style="max-height: 250px;">
                </a>
            </div>
            @endforeach
        </div>
    </div>
  </div>


@endsection