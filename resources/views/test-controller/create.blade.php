<script src="{{URL::to('general/ajax.js')}}"></script>
<select id="drp_treatment"></select> </br>
<input id="treatment_date" placeholder="Nama Lokal"/> </br>
<button onclick="startAdd()">Create</button>
<script>
    var token = "{{Session::token()}}";
    var baseUrl="{{URL::to('/')}}";
</script>

<script src="{{URL::to('back-end/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{URL::to('back-end/js/common_name/common_name.js')}}"></script>