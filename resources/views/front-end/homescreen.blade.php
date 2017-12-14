@extends('template.template-homescreen')

@section('title')
{{ config('app.name', 'Laravel') }}
@endsection

@section('content')
<section class="mbr-section mbr-section-hero mbr-section-full header2 mbr-parallax-background mbr-after-navbar" id="header2-1" style="background-image: url({{URL::to('homescreen/pictures/trees.gif')}});">
        <div class="caption">
            "we are commited to making the world a better place with love your tree from yourself, cleaner and greener. we're planting and managing trees where they're needed most in city. PLANT AND CARE"
        </div>
<!--    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(139, 195, 74);">
    </div>

    <div class="mbr-table mbr-table-full">
        <div class="mbr-table-cell">
            <div class="container">
                <div class="mbr-section row">
                    <div class="mbr-table-md-up">

                    </div>
                </div>
            </div>

        </div>
    </div>-->
    <div class="mbr-arrow mbr-arrow-floating hidden-sm-down" aria-hidden="true"><a href="#what-we-do"><i class="mbr-arrow-icon"></i></a></div>

</section>

<section id="what-we-do" class="mbr-section mbr-section__container article" style="padding-top: 83px; font-family: courier; background-color: rgb(244, 244, 244); padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-2">WHAT WE DO?</h3>
                <div class="text-definition" style="padding-bottom: 5vh">Caring for tree in urban area by intergrating tree health data with technology&nbsp;</div>
            </div>
        </div>
    </div>
    <div id="slider-1" class="mbr-slider carousel slide" data-ride="carousel">
        <ol class="carousel-indicators display-4 hidden-md-down">
            <li data-target="#slider-1" data-slide-to="0" class="active">Inventory Your Tree</li>
            <li data-target="#slider-1" data-slide-to="1">Track Your Tree Care</li>
            <li data-target="#slider-1" data-slide-to="2">Analyze Your Data</li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="{{URL::to('homescreen/pictures/carousel-img1.png')}}" alt="inventory-your-tree.png" class="img-responsive nopadding col-lg-6 col-md-12 col-xs-12">
                <div class="text-definition nopadding col-xs-12 hidden-lg-up text-on-image">Map trees from your phone or tablet and upload existing data</div>
                <div class="text-definition nopadding col-lg-6 hidden-md-down" style="padding-top: 10vh;">Map trees from your phone or tablet and upload existing data</div>
            </div>
            <div class="carousel-item">
                <div class="text-definition nopadding col-lg-6 hidden-md-down" style="padding-top: 10vh;">Log maintenance activities, add photo, and update tree records in your city</div>
                <img src="{{URL::to('homescreen/pictures/carousel-img2.png')}}" alt="inventory-your-tree.png" class="img-responsive nopadding col-lg-6 col-md-12 col-xs-12">
                <div class="text-definition nopadding col-xs-12 hidden-lg-up text-on-image">Log maintenance activities, add photo, and update tree records in your city</div>
            </div>
            <div class="carousel-item">
                <img src="{{URL::to('homescreen/pictures/carousel-img3.png')}}" alt="inventory-your-tree.png" class="img-responsive nopadding col-lg-6 col-md-12 col-xs-12">
                <div class="text-definition nopadding col-xs-12 hidden-lg-up text-on-image">Calculate ecosystem benefits and run advanced searches to identify key insight</div>
                <div class="text-definition nopadding col-lg-6 hidden-md-down" style="padding-top: 10vh;">Calculate ecosystem benefits and run advanced searches to identify key insight</div>
            </div>
        </div>
        <a class="left carousel-control hidden-lg-up" href="#slider-1" data-slide="prev">
        </a>
        <a class="right carousel-control hidden-lg-up" href="#slider-1" data-slide="next">
        </a>
    </div>
</section>

<section id="how-we-do" class="mbr-section mbr-section__container article" style="padding-top: 83px; font-family: courier; background-color: rgba(171, 222, 227, 0.78); padding-bottom: 0px; min-height:100vh;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-2">HOW WE DO IT?</h3>
                <div class="text-definition">We collect all the physical and health data of trees in urban areas using android phone and the data will intergrate with our server that can you access &nbsp;</div>
                <div id="slider-2" class="mbr-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="{{URL::to('homescreen/pictures/carousel2-img1.png')}}" alt="our-mission.png" class="img-responsive center-block" style="">
                            <div class="text-description">we are commited to making the world a better place with love your tree from yourself, cleaner and greener. we're planting and managing trees where they're needed most in city. PLANT AND CARE</div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{URL::to('homescreen/pictures/carousel2-img2.png')}}" alt="manage-data-collection.png" class="img-responsive center-block" style="">
                            <div class="text-description">You need to know your data is in the right hands. With CiBOR, you can add unlimited users, sets user roles and permissions, and track edit history so you always know what is being updated when.</div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{URL::to('homescreen/pictures/carousel2-img3.png')}}" alt="model-future-planning.png" class="img-responsive center-block" style="">
                            <div class="text-description">Want to measure and report on the long -term impacts of your tree planting? our modeling tool lets you create custom planting scenarios and forecast ecosystem benefits over time. We provide pre-set mortality, which you can further customize.</div>
                        </div>
                    </div>
                    <ol class="hidden-md-down carousel-indicators">
                        <li data-target="#slider-2" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-2" data-slide-to="1"></li>
                        <li data-target="#slider-2" data-slide-to="2"></li>
                    </ol>
                    <a class="left carousel-control hidden-lg-up" href="#slider-2" data-slide="prev">
                    </a>
                    <a class="right carousel-control hidden-lg-up" href="#slider-2" data-slide="next">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="why-we-do" class="mbr-section mbr-section__container article" id="slider-3" style="padding-top: 83px; font-family: courier; background-color: rgb(244, 244, 244); padding-bottom: 0px;">
    <h3 class="mbr-section-title display-2">WHY WE DO IT?</h3>
        <div id="slider-3" class="mbr-slider carousel slide" data-ride="carousel">
            <ol class="carousel-indicators hidden-md-down">
                <li data-target="#slider-3" data-slide-to="0" class="active"><img src="{{URL::to('homescreen/pictures/clean-air-icon.png')}}" alt="clean-air-icon.png" style="height: 10vh; margin-top: 5vh"></li>
                <li data-target="#slider-3" data-slide-to="1"><img class="img-responsive" src="{{URL::to('homescreen/pictures/absorb-stormwater-icon.png')}}" alt="absorb-stormwater-icon.png" style="height: 10vh; margin-top: 5vh"></li>
                <li data-target="#slider-3" data-slide-to="2"><img class="img-responsive" src="{{URL::to('homescreen/pictures/save-energy-icon.png')}}" alt="save-energy-icon.png" style="height: 10vh; margin-top: 5vh"></li>
                <li data-target="#slider-3" data-slide-to="3"><img class="img-responsive" src="{{URL::to('homescreen/pictures/control-climate-icon.png')}}" alt="control-climate-icon.png" style="height: 10vh; margin-top: 5vh"></li>
                <li data-target="#slider-3" data-slide-to="4"><img class="img-responsive" src="{{URL::to('homescreen/pictures/calm-traffic-icon.png')}}" alt="calm-traffic-icon.png" style="height:10vh; margin-top: 5vh"></li>
                <li data-target="#slider-3" data-slide-to="5"><img class="img-responsive" src="{{URL::to('homescreen/pictures/prevent-species-loss-icon.png')}}" alt="prevent-species-loss-icon.png" style="height: 10vh; margin-top: 5vh"></li>
                <li data-target="#slider-3" data-slide-to="6"><img class="img-responsive" src="{{URL::to('homescreen/pictures/feed-the-human-soul-icon.png')}}" alt="feed-the-human-soul-icon.png" style="height: 10vh; margin-top: 5vh"></li>
            </ol>
            <section class="inner-box">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active" style="">
                        <center><img src="{{URL::to('homescreen/pictures/clean-air-icon.png')}}" alt="clean-air-icon.png" style="height: 10vh; margin-top: 5vh; filter: brightness(500%);" class="img-responsive hidden-lg-up"></center>
                        <div class="text-definition">Trees remove carbon dioxide from the air and produce oxygen. Trees also intercept airborne pollutants common to cities.</div>
                        <h3 class="display-4">CLEAN AIR</h3>
                    </div>
                    <div class="carousel-item" style="">
                        <center><img src="{{URL::to('homescreen/pictures/absorb-stormwater-icon.png')}}" alt="absorb-stormwater-icon.png" style="height: 10vh; margin-top: 5vh; filter: brightness(500%);" class="img-responsive hidden-lg-up"></center>
                        <div class="text-definition">Trees absorb stormwater runoff, reducing erosion and pollution in our waterways. A healthy tree canopy means cleaner rivers and less investment in costly infrastructure.</div>
                        <h3 class="display-4">ABSORB STORMWATER</h3>
                    </div>
                    <div class="carousel-item" style="">
                        <center><img src="{{URL::to('homescreen/pictures/save-energy-icon.png')}}" alt="save-energy-icon.png" style="height: 10vh; margin-top: 5vh; filter: brightness(500%);" class="img-responsive hidden-lg-up"></center>
                        <div class="text-definition">trees provide shade, saving district residents and businesses</div>
                        <h3 class="display-4">SAVE ENERGY</h3>
                    </div>
                    <div class="carousel-item" style="">
                        <center><img src="{{URL::to('homescreen/pictures/control-climate-icon.png')}}" alt="control-climate-icon.png" style="height: 10vh; margin-top: 5vh; filter: brightness(500%);" class="img-responsive hidden-lg-up"></center>
                        <div class="text-definition">tree can control climate change in urban area</div>
                        <h3 class="display-4">CONTROL CLIMATE CHANGE</h3>
                    </div>
                    <div class="carousel-item" style="">
                        <center><img src="{{URL::to('homescreen/pictures/calm-traffic-icon.png')}}" alt="calm-traffic-icon.png" style="height: 10vh; margin-top: 5vh; filter: brightness(500%);" class="img-responsive hidden-lg-up"></center>
                        <div class="text-definition">tree lined streets have a traffic calming effect, which keeps drivers and pedestrian safe</div>
                        <h3 class="display-4">CALM TRAFFIC</h3>
                    </div>
                    <div class="carousel-item" style="">
                        <center><img src="{{URL::to('homescreen/pictures/prevent-species-loss-icon.png')}}" alt="prevent-species-loss-icon.png" style="height: 10vh; margin-top: 5vh; filter: brightness(500%);" class="img-responsive hidden-lg-up"></center>
                        <div class="text-definition">tree provide food, homes and shelter for many native and migratory animals</div>
                        <h3 class="display-4">PREVENT SPECIES LOSS</h3>
                    </div>
                    <div class="carousel-item" style="">
                        <center><img src="{{URL::to('homescreen/pictures/feed-the-human-soul-icon.png')}}" alt="feed-the-human-soul-icon.png" style="height: 10vh; margin-top: 5vh; filter: brightness(500%);" class="img-responsive hidden-lg-up"></center>
                        <div class="text-definition">Green spaces help residents combat stress, anxiety and depression. Exposure to trees and nature aids concentration by reducing mental fatigue. access to nature is also associated with fewer sick days and faster recovery times</div>
                        <h3 class="display-4">FEED THE HUMAN SOUL</h3>
                    </div>
                </div>
                <a class="left carousel-control hidden-lg-up" href="#slider-3" data-slide="prev">
                </a>
                <a class="right carousel-control hidden-lg-up" href="#slider-3" data-slide="next">
                </a>
            </section>
        </div>
</section>

<section style="min-height: 20vh; text-align: center">
    <div class="col-md-8 col-xs-12 display-4">
        The industry leader in tree inventory
    </div>
    <div class="col-md-4 col-xs-12 display-4">
        <a href="{{ route('ministered.index') }}" id="btn-join-us" class="navbar-caption">Join Us</a>
    </div>
</section>

@endsection
