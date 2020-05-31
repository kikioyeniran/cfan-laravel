<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<header class="site-navbar py-3" role="banner">

    <div class="container-fluid">
      <div class="row align-items-center">

        <div class="col-6 col-xl-2" data-aos="fade-down">
          <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0"><img src="{{ asset('images/cf6.png')}}" alt="IMage" class="img-fluid"></a></h1>
        </div>
        <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
          <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

            <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
              <li class="active"><a href="/">Home</a></li>
              <li class="has-children">
                <a href="#">Art Works</a>
                <ul class="dropdown">
                    @foreach($cat_links as $cl)
                        <li>
                            <a href="/artworks/{{$cl->link}}">{{$cl->name}}</a>
                        </li>
                    @endforeach
                </ul>
              </li>

              <li><a href="/services">Services</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/events">Events(Exhibitions)</a></li>
              <li><a href="/news">News</a></li>
              <li><a href="/contacts">Contact</a></li>
            </ul>
          </nav>
        </div>

        <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
          <div class="d-none d-xl-inline-block">
            <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                @foreach($comp_details as $cd)
                    <li>
                        <a href="{{$cd->fb_link}}" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                    </li>
                    <li>
                        <a href="{{$cd->tw_link}}" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                    </li>
                    <li>
                        <a href="{{$cd->ig_link}}" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                    </li>
                    <li>
                        <a href="{{$cd->yt_link}}" class="pl-3 pr-3"><span class="icon-youtube-play"></span></a>
                    </li>
                @endforeach
            </ul>
          </div>

          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>

      </div>
    </div>

  </header>