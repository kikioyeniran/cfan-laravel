@extends('public.layouts.app')

@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Subscribe To Our Newsletter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<div class="site-section"  data-aos="fade">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-md-11">
          <div class="row mb-5">
            <div class="col-12 ">
              <h2 class="site-section-heading text-center">News Articles</h2>
            </div>
          </div>
          <div class="card-deck">
            @foreach ($news as $post)
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('/storage/pictures/' . $post->picture)}}" alt="Card image cap" style="max-height: 300px;">
                        <div class="card-body">
                            <a href="news/{{$post->link}}"><h5 class="card-title">{{strtoupper($post->title)}}</h5></a><hr/>
                            <p class="card-text">{{$post->author}} |<a href="news/{{$post->link}}" class="btn btn-outline-white py-2 px-4">View Event</a></p>

                            <p class="card-text">{{$post->summary}}</p>
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