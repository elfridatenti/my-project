<!DOCTYPE html>
<html lang="en">
  
  <!-- Navbar -->
  @include('partials.beranda_head')
  <!-- End Navbar -->

  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <!-- Navbar -->
    @include('partials.beranda_navbar')
    <!-- End Navbar -->
       

      <section class="slice slice-md bg-section-secondary" id="quotediv">
        <div class="container-swiper-js-container">
          <div class="mb-5 px-3 text-center">
            <div class="container">
       
              <div class="row" style="padding-top:40px;">
                <div class="col-sm-12 mt-5">
                  <div class="text-center mt-3">
                    <div class="head-text">
                      <h2 class="font-weight-bold">Berita</h2>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row py-5">
                @foreach($news as $item)
                <div class="col-lg-4">
                  <div class="card border-0">
                    <img src="{{ asset('storage/news/' . $item->image) }}" class="img-fluit mb-3" alt="">
                    <div class="konten-berita">
                      <p class="mb-3 text-secondary">{{$item->date}}</p>
                      <h4 class="fw-bold mb-3"><a href="{{ route('news', $item->slug) }}">{{$item->title}}</a></h4>
                      <p>{!! Str::limit(strip_tags($item->content), 100) !!}</p>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>

            </div>  
          </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.beranda_footer')
    <!-- End Footer -->
  </div>

  <!-- Script -->
  @include('partials.beranda_script')
  <!-- End Script -->

 

  </body>
</html>