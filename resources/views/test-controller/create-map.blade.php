<script src="{{URL::to('general/ajax.js')}}"></script>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>

<select id="drp_negara"></select> </br>
<input id="nama_provinsi"/></br>
<div id="map"></div>
<button onclick="startAdd()">Create</button>

<script>
    var token = "{{Session::token()}}";
    var baseUrl="{{URL::to('/')}}";
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFXsQRK-9VXQg6jmNvdn64T1L35JqTKEM&callback=initMap&libraries=drawing,geometry" async defer></script>
<script src="{{URL::to('back-end/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{URL::to('back-end/js/provinsi/provinsi.js')}}"></script> 
<script src="{{URL::to('general/MapEditor.js')}}"></script>