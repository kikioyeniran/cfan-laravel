@extends('public.layouts.app')

@section('content')
<div class="" data-aos="fade">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="row mb-5 site-section">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">About Us</h2>
            </div>
          </div>
          @foreach ($comp_details as $comp)
            <div class="row mb-5">
                <div class="col-md-7">
                <img src="{{ asset('/storage/pictures/' . $comp->picture)}}" alt="Images" class="img-fluid">
                </div>
                <div class="col-md-4 ml-auto">
                <h3>Our Mission</h3>
                <p>{!! $comp->mission !!}</p>
                </div>
            </div>
        @endforeach


          <div class="row site-section">
            @foreach($artists as $art)
              <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5">
                <img src="{{ asset('/storage/pictures/' . $art->picture)}}" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                <h2 class="text-black font-weight-light mb-4">{{$art->name}}</h2>
                <div class="row mb-10">
                  <div class="col-12 ">
                    <p>{!! $art->bio !!}</p>
                    <p>
                      <a href="#" class="pl-0 pr-3"><span class="icon-twitter"></span></a>
                      <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                      <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
                    </p>
                  </div>
              </div>
                {{-- <p class="mb-4">{{$art->bio}}</p> --}}

              </div>
            @endforeach
          </div>
        </div>

      </div>
    </div>
  </div>


@endsection