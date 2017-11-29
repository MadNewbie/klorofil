@extends('template.template-back-end')

@section('title')
Admin - Negara
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('styles')
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
@endsection

@section('content')
<div class="x_panel">
<div class=row>
  <div class="col-md-12  col-sm-12 col-xs-12">
    <input id="nama_negara" class="form-control" placeholder="Nama Negara"/>
  </div><div class="clearfix"></div>
  <br />
  <div id="map" class="form-control col-md-10 col-sm-10 col-xs-10"></div>
  <div class="clearfix"></div>
  <br />
  <div class="col-md-2 col-sm-2 col-xs-2">
    <button class="form-control" onclick="startAdd()">Create</button>
  </div>
</div>
</div>

<script>
    var token = "{{Session::token()}}";
    var baseUrl="{{URL::to('/')}}";
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFXsQRK-9VXQg6jmNvdn64T1L35JqTKEM&callback=initMap&libraries=drawing,geometry" async defer></script>
<script src="{{URL::to('back-end/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{URL::to('back-end/js/negara/negara.js')}}"></script>
<script src="{{URL::to('general/MapEditor.js')}}"></script>
@endsection
