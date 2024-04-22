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
        <div class="mb-5 px-3">
          <div class="container">

            <div class="row" style="padding-top:40px; margin-bottom:50px;">
              <div class="col-sm-12 mt-5">
                <div class="text-center mt-3">
                  <div class="head-text">
                    <h2 class="font-weight-bold">Berita</h2>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-4">
                    <img src="{{ asset('storage/news/' . $news->image) }}" class="img-fluid" height="500px" width="300px" alt="Image">
                  </div>
                  <div class="col-lg-8">
                    <h3 class="font-weight-bold">{{ $news->title }}</h3>
                    <p>{{ $news->created_at }}</p>
                    <div style="padding-top: 20px;">
                      {!! $news->content !!}
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
