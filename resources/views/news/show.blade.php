@extends('public.layouts.app')

@section('content')
<div class="" data-aos="fade">
    <div class="container-fluid">
        @foreach ($news as $post)
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row mb-5 site-section"  style="padding-bottom: 10px;">
                        <div class="col-12 ">
                            <h2 class="site-section-heading text-center">{{ strtoupper($post->title)}}</h2>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <img src="{{ asset('/storage/pictures/' . $post->picture)}}" alt="Images" class="img-fluid" style="border-top-left-radius: 2%; border-top-right-radius: 2%; width: 100%; max-height: 400px">
                        </div>

                        <div class="col-md-12">
                            <br>
                            <h3 style="padding-left: 40%"> BY {{ strtoupper($post->author)}}</h3>
                            {{-- <p>{!! $post->summary !!}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row mb-5">
                        <div class="col-12 ">
                        <p>{!! $post->details !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  </div>


@endsection