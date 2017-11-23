@extends('template.template-front-end')
@section('content')
<section class="main_container">
    <div class="info-section col-lg-3 hidden-md-down">
        
    </div>
    <div class="col-lg-9 col-md-12" id="map-section">
        
    </div>
    <div  class="info-section col-md-12 hidden-lg-up">
        
    </div>
</section>
@endsection

@section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqbtULHt9MCzx6qiqosU40KgeKVylVTL0&callback=initMap" type="text/javascript"></script>
@endsection