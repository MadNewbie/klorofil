<!doctype htm>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield ('title')</title>
        <link rel="stylesheet" href="{{URL::to('general/bootstrap/dist/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{URL::to('front-end/mobirise/css/mbr-additional.css')}}"/>
        <link rel="stylesheet" href="{{URL::to('front-end/tether/tether.min.css')}}"/>
        <link rel="stylesheet" href="{{URL::to('front-end/style.css')}}"/>
        @yield('style')
    </head>
    <body>
        @include('header.front-end')
        <div class='container main'>
            @yield('content')
        </div>
        @yield('script')
        <script type='text/javascript' src="{{URL::to('general/smooth-scroll/smooth-scroll.js')}}"/>
        <script type='text/javascript' src="{{URL::to('general/bootstrap/dist/js/bootstrap.min.js')}}"/>
        <script type='text/javascript' src="{{URL::to('general/jquery/dist/jquery.min.js')}}"/>
    </body>
</html>