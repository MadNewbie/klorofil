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
<input id="nama_negara" placeholder="Nama Negara"/></br>
<div id="map"></div>
<button onclick="startAdd()">Create</button>

<script>
    var token = "{{Session::token()}}";
    var baseUrl="{{URL::to('/')}}";
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFXsQRK-9VXQg6jmNvdn64T1L35JqTKEM&callback=initMap&libraries=drawing,geometry" async defer></script>
<script src="{{URL::to('back-end/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{URL::to('back-end/js/negara/negara.js')}}"></script> 
<script src="{{URL::to('general/MapEditor.js')}}"></script>
@endsection