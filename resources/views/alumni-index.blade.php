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
                      <h2 >Profil Alumni </h2>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-4">

                @foreach($data as $item)

                <div class="col-md-3 mb-4">

                  <a href="{{ route('alumni.detail', $item->id) }}">
                    <div class="card border-0 shadow">
                      <img src="{{ asset('assets/' . ($item->img) ) }}" class="card-img-top" alt="">
                      <div class="card-body text-left">
                        <h5 class="card-title text-dark mb-0">{{ ($item->nama) }}</h5>
                        <p class="text-dark">{{ $item->jurusan }} Lulus {{ $item->tahun_lulus }}</p>
                      </div>
                    </div>
                  </a>

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