@extends('template.template-guest')

@section('title')
{{ config('app.name', 'Laravel') }}
@endsection

@section('content')
<section class="mbr-section mbr-section-hero header2 mbr-parallax-background mbr-after-navbar search-embed" id="header2-1" style="background-color: rgba(69, 90, 100, 1);">

</section>
<section id="top-content" class="mbr-section mbr-section__container article" style="padding-top: 0px; font-family: courier; background-color: rgba(69, 90, 100, 1); padding-bottom: 25px;">
  <div class="container" style="">
    <div class="row clearfix">
      <form class="form form-inline" action="" method="">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="form-group">
            <input class="form-control" type="search" placeholder="What are you looking for within this section?" style="width: 498px;">
            <!-- <div class="input-group-addon"> -->
              <button class="form-control" style="width: 80px;">Search</button>
            <!-- </div> -->
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<section id="our-client" class="mbr-section mbr-section__container article" style="padding-top: 183px; font-family: courier; background-color: rgb(244, 244, 244); padding-bottom: 0px;">
  <div class="container">
    <form class="form form-inline">
      <div class="row">
        <div class="form-group" style="display: block;">
          <div><p><a href="{{ route('guest.information') }}" id="btn-join-us" class="btn">A link</a></p></div>
          <div><p><a href="{{ route('guest.information') }}" id="btn-join-us" class="btn">A link</a></p></div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </form>
  </div>
</section>
<section id="bottom-content" style="min-height: 5vh; text-align: center">

</section>
@endsection

@section('script')
@endsection
