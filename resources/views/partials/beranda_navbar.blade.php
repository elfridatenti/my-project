<header class="site-navbar " role="banner">

      <div class="top-bar">
      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <img src="/images/Logo.png" alt="Image" height="80" width="80">
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="active"><a href="{{ route('beranda') }}">Home</a></li>
                <li><a href="">About Us</a></li>
                <li class="has-children">
                  <a href="#">Gallery</a>
                  <ul class="dropdown">
                    <li><a href="">Gallery Photo</a></li>
                    <li><a href="">Gallery Video</a></li>
                  </ul>
                </li>
                <li><a href="{{ route('alumni.index') }}">Alumni</a></li>
                <li><a href="{{ route('news_index') }}">News</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="{{ route('signin') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Registrasi</a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
        </div>
      </div>
      
    </header>