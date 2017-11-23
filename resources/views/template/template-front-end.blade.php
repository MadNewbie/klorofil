<!DOCTYPE html>
<html>
    <head>
        <title>CiBOR</title>
        <link rel="shortcut icon" href="{{URL::to('general/pictures/icon-logo.png')}}"/>
        <link rel="stylesheet" href="{{URL::to('back-end/vendors/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('front-end/assets/bootstrap-material-design-font/css/material.css')}}">
        <link rel="stylesheet" href="{{URL::to('front-end/assets/web/assets/mobirise-icons/mobirise-icons.css')}}">
        <link rel="stylesheet" href="{{URL::to('front-end/assets/et-line-font-plugin/style.css')}}">
        <link rel="stylesheet" href="{{URL::to('front-end/assets/tether/tether.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('front-end/assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('front-end/assets/dropdown/css/style.css')}}">
        <link rel="stylesheet" href="{{URL::to('front-end/assets/animate.css/animate.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('front-end/assets/theme/css/style.css')}}">
        <link rel="stylesheet" href="{{URL::to('front-end/assets/mobirise/css/mbr-additional.css')}}">
        <link rel="stylesheet" href="{{URL::to('front-end/assets/custom-style.css')}}">
    </head>
    <body>
        <div id="menu-0" custom-code="true">
            <section>
                <nav id="navigation-bar" class="navbar navbar-dropdown bg-color navbar-fixed-top">
                <div class="container">
                    <div class="mbr-table">
                        <div class="col-md-4 hidden-md-down mbr-table-cell">
                            <a id="btn-get-started" href="#" class="navbar-caption">Join Us</a>
                        </div>
                        <div class="col-xs-6 col-md-4 mbr-table-cell">
                            <center><a id="btn-home" href="{{route('web.home')}}" class="navbar-caption"><img style="padding:1vh; height:40px;" src="{{URL::to('homescreen/pictures/logo.png')}}"></a></center>
                        </div>
                        <div class="col-xs-6 col-md-4 mbr-table-cell">
                            <button class="navbar-toggler pull-xs-right hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                                <div class="hamburger-icon"></div>
                            </button>
                            <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                              <li class="nav-item hidden-lg-up"><a class="nav-link link mbr-editable-menu-item" href="#">Join Us</a></li>
                              <li class="nav-item"><a class="nav-link link mbr-editable-menu-item" href="#">Login</a></li>
                              <li class="nav-item"><a class="nav-link link mbr-editable-menu-item" href="#">Help</a></li>
<!--                              <li class="nav-item dropdown open">
                                  <a class="nav-link link dropdown-toggle mbr-editable-menu-item" href="#" data-toggle="dropdown-submenu" aria-expanded="true">About Us</a>
                                  <div class="dropdown-menu">
                                      <a href="#" class="dropdown-item mbr-editable-menu-item">Blog</a>
                                  </div>
                              </li>-->
                            </ul>
                            <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                                <div class="close-icon"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
            </section>
            @yield('content')
            @yield('script')
        </div>
         <script src="{{URL::to('front-end/assets/web/assets/jquery/jquery.min.js')}}"></script>
        <script src="{{URL::to('front-end/assets/tether/tether.min.js')}}"></script>
        <script src="{{URL::to('front-end/assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::to('front-end/assets/smooth-scroll/smooth-scroll.js')}}"></script>
        <script src="{{URL::to('front-end/assets/dropdown/js/script.min.js')}}"></script>
        <script src="{{URL::to('front-end/assets/touch-swipe/jquery.touch-swipe.min.js')}}"></script>
        <script src="{{URL::to('front-end/assets/viewport-checker/jquery.viewportchecker.js')}}"></script>
        <script src="{{URL::to('front-end/assets/jarallax/jarallax.js')}}"></script>
        <script src="{{URL::to('front-end/assets/theme/js/script.js')}}"></script>
    </body>
</html>