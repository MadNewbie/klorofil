<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{URL::to('general/pictures/icon-logo.png')}}"/>
        <link rel="stylesheet" href="{{URL::to('back-end/vendors/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('homescreen/assets/bootstrap-material-design-font/css/material.css')}}">
        <link rel="stylesheet" href="{{URL::to('homescreen/assets/web/assets/mobirise-icons/mobirise-icons.css')}}">
        <link rel="stylesheet" href="{{URL::to('homescreen/assets/et-line-font-plugin/style.css')}}">
        <link rel="stylesheet" href="{{URL::to('homescreen/assets/tether/tether.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('homescreen/assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('homescreen/assets/dropdown/css/style.css')}}">
        <link rel="stylesheet" href="{{URL::to('homescreen/assets/animate.css/animate.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('homescreen/assets/theme/css/style.css')}}">
        <link rel="stylesheet" href="{{URL::to('homescreen/assets/mobirise/css/mbr-additional.css')}}">
        <link rel="stylesheet" href="{{URL::to('homescreen/assets/custom-style.css')}}">
    </head>
    <body>
        <div id="menu-0" custom-code="true">
        <section>
            <nav id="navigation-bar" class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
                <div class="container">
                    <div class="mbr-table">
                        <div class="col-md-4 hidden-md-down mbr-table-cell">
                            <a id="btn-get-started" href="{{route('ministered.index')}}" class="navbar-caption">Login</a>
                        </div>
                        <div class="col-xs-6 col-md-4 mbr-table-cell">
                            <center><a id="btn-home" href="{{route('ministered.index')}}" class="navbar-caption"><img style="padding:1vh; height:70px;" src="{{URL::to('homescreen/pictures/logo.png')}}"></a></center>
                        </div>
                        <div class="col-xs-6 col-md-4 mbr-table-cell">
                            <button class="navbar-toggler pull-xs-right hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                                <div class="hamburger-icon"></div>
                            </button>
                            <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                              <li class="nav-item hidden-lg-up"><a class="nav-link link mbr-editable-menu-item" href="{{route('ministered.index')}}">Login</a></li>
                              <li class="nav-item"><a class="nav-link link mbr-editable-menu-item" href="{{route('guest.index')}}">Homepage</a></li>
                              <li class="nav-item"><a class="nav-link link mbr-editable-menu-item" href="#how-we-do">Projects</a></li>
                              <li class="nav-item"><a class="nav-link link mbr-editable-menu-item" href="#why-we-do">Impacts</a></li>
                              <li class="nav-item"><a class="nav-link link mbr-editable-menu-item" href="#">Blog</a></li>
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
        <section id="footer" style="padding-bottom: 5vh">
            <div class="container">
                <div class="col-md-4 col-xs-12">
                    <i class="fa fa-envelope-o"></i> tatacipta.kanopi@gmail.com
                </div>
                <div class="col-md-4 col-xs-12">
                    <i class="fa fa-phone-square"></i> 0341-417557; +62 812-3311-047
                </div>
                <div class="col-md-4 col-xs-12">
                    <i class="fa fa-map-marker"></i> BB 02 Permata Jingga, Malang - East Java
                </div>
                </br>
                <div class="col-md-4 col-xs-12">
                    <i class="fa fa-facebook-square"></i> Tata Cipta Kanopi
                </div>
                <div class="col-md-4 col-xs-12">
                    <i class="fa fa-twitter-square"></i> @tataciptakanopi
                </div>
                <div class="col-md-4 col-xs-12">
                    <i class="fa fa-instagram"></i> @tataciptakanopi
                </div>
            </div>
        </section>
        <script src="{{URL::to('homescreen/assets/web/assets/jquery/jquery.min.js')}}"></script>
        <script src="{{URL::to('homescreen/assets/tether/tether.min.js')}}"></script>
        <script src="{{URL::to('homescreen/assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::to('homescreen/assets/smooth-scroll/smooth-scroll.js')}}"></script>
        <script src="{{URL::to('homescreen/assets/dropdown/js/script.min.js')}}"></script>
        <script src="{{URL::to('homescreen/assets/touch-swipe/jquery.touch-swipe.min.js')}}"></script>
        <script src="{{URL::to('homescreen/assets/viewport-checker/jquery.viewportchecker.js')}}"></script>
        <script src="{{URL::to('homescreen/assets/jarallax/jarallax.js')}}"></script>
        <script src="{{URL::to('homescreen/assets/theme/js/script.js')}}"></script>
        </div>
    </body>
</html>