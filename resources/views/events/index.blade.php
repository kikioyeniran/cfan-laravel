@extends('public.layouts.app')

@section('content')
<div class="site-section"  data-aos="fade">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-md-11">
          <div class="row mb-5">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">Events and Exhibitions</h2>
            </div>
          </div>
          <div class="card-deck">
            @foreach ($events as $post)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('/storage/pictures/' . $post->picture)}}" alt="Card image cap" style="max-height: 300px;">
                        <div class="card-body">
                            <a href="events/{{$post->link}}"><h5 class="card-title">{{strtoupper($post->theme)}}</h5></a><hr/>
                            <p class="card-text">{{$post->location}} |<a href="events/{{$post->link}}" class="btn btn-outline-white py-2 px-4">View Event</a></p>

                            {{-- <p class="card-text">{{$post->description}}</p> --}}
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated {{$post->updated_at}}</small>
                        </div>
                    </div>
                </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
</div>
@endsection