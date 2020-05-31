@extends('public.layouts.app')

@section('content')
<div class="container-fluid" data-aos="fade" data-aos-delay="500">
    <div class="swiper-container images-carousel">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="image-wrap">
                <div class="image-info">
                  <h2 class="mb-3">Abstract art</h2>
                  <a href="#" class="btn btn-outline-white py-2 px-4">More Art Works</a>
                </div>
                <img src="{{ asset('images/abstract.jpg')}}" alt="Image">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="image-wrap">
                <div class="image-info">
                  <h2 class="mb-3">Wood Works</h2>
                  <a href="#" class="btn btn-outline-white py-2 px-4">More Art Works</a>
                </div>
                <img src="{{ asset('images/w02.jpg')}}" alt="Image">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="image-wrap">
                <div class="image-info">
                  <h2 class="mb-3">Mixed Media</h2>
                  <a href="#" class="btn btn-outline-white py-2 px-4">More Art Works</a>
                </div>
                <img src="{{ asset('images/mixed.jpg')}}" alt="Image">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="image-wrap">
                <div class="image-info">
                  <h2 class="mb-3">Portrait Painting</h2>
                  <a href="#" class="btn btn-outline-white py-2 px-4">More Art Works</a>
                </div>
                <img src="{{ asset('images/portrait.jpg')}}" alt="Image">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="image-wrap">
                <div class="image-info">
                  <h2 class="mb-3">Wearable art</h2>
                  <a href="#" class="btn btn-outline-white py-2 px-4">More Art Works</a>
                </div>
                <img src="{{ asset('images/wearable.jpg')}}" alt="Image">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="image-wrap">
                <div class="image-info">
                  <h2 class="mb-3">Wood Works</h2>
                  <a href="#" class="btn btn-outline-white py-2 px-4">More Art Works</a>
                </div>
                <img src="{{ asset('images/w03.jpg')}}" alt="Image">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="image-wrap">
                <div class="image-info">
                  <h2 class="mb-3">abstract art</h2>
                  <a href="#" class="btn btn-outline-white py-2 px-4">More Art Works</a>
                </div>
                <img src="{{ asset('images/abstract2.jpg')}}" alt="Image">
              </div>
            </div>
        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-scrollbar"></div>
    </div>
</div>
<br/><br>
<div class="container-fluid" data-aos="fade" data-aos-delay="500">
  <div class="row mb-5">
    <div class="col-12 ">
      <h2 class="site-section-heading text-center">Latest News</h2>
    </div>
  </div>
  <div class="card-deck">
    @foreach ($news as $post)
    <div class="card">
      <a href="news/{{$post->link}}"><img class="card-img-top" src="{{ asset('/storage/pictures/' . $post->picture)}}" alt="Card image cap" style="max-height: 300px;"></a>
      <div class="card-body">
        <a href="news/{{$post->link}}"><h5 class="card-title">{{$post->title}}</h5></a>
        <p class="card-text">{{$post->summary}}</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated {{$post->updated_at}}</small>
      </div>
    </div>
    @endforeach
  </div>
</div>
{{-- <button class="button clear-cookie">Clear Cookie</button>
</div> --}}

<div id="modal-content">
  <h2>Subscribe To Our Newsletter</h2>
  <label for="yurEmail">Your Email Adress:</label>
  {!! Form::open(['action' => 'NewsletterController@store', 'method' => 'POST']) !!}
    {{-- <input placeholder="me@example.com" id="yurEmail"> --}}
    {{Form::text('email', '', ['placeholder' => 'me@example.com', 'id' => 'yurEmail'])}}
    {{-- <button class="button order-cheezburger">Subscribe</button> --}}
    {{Form::submit('Subscribe', ['class'=> 'button order-cheezburger'])}}
  {!! Form::close() !!}
</div>
@endsection