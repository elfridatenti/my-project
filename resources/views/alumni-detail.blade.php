<!DOCTYPE html>
<html lang="en">
  
  <!-- Navbar -->
  @include('partials.beranda_head')
  <!-- End Navbar -->

  <link rel="stylesheet" href="/assets/ckeditor/ckeditor.js">

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
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-md-12">

                    <div class="card">
                      <div class="card-body text-left">
                        <h5 class="card-title text-dark">{{ ($item->jurusan) }}, {{ ($item->profesi) }}</h5>

                        <h3>{{ $item->nama }}</h3>

                        <div class="row">
                          <div class="col-md-6">
                            {!! $item->desk !!}

                            <br>
                            <br>

                            <a href="{{ route('alumni.index') }}" class="btn btn-secondary">Kembali</a>
                          </div>

                          <div class="col-md-6">
                            <img src="{{ asset('assets/' . ($item->img) ) }}" class="img-fluid" alt="">
                          </div>
                        </div>
                      </div>
                    </div>

                </div>

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