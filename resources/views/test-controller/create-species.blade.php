<script src="{{URL::to('general/ajax.js')}}"></script>

<input id="species_id" placeholder="ID Species"/> </br>
<input id="scientific_name" placeholder="Nama Ilmiah" /> </br>
<input id="density" placeholder="Massa Jenis" ptype="number" step="0.01"/> </br>
<input id="max_age" placeholder="Umur Maksimal" ptype="number" step="1"/> </br>
<input id="flower_color" placeholder="Warna Bunga" /> </br>
<input id="flower_crown_shape" placeholder="Bentuk Mahkota Bunga" /> </br>
<input id="flower_crown_number" placeholder="Jumlah Mahkota Bunga" /> </br>
<input id="flower_bloom_periode" placeholder="Periode Bunga Mekar" /> </br>
<select id="drp_species_type"></select> </br>
<select id="drp_leaf_type"></select> </br>
<select id="drp_branch_type"></select> </br>
<select id="drp_trunk_type"></select> </br>
<select id="drp_root_type"></select> </br>
<select id="drp_function_type"></select> </br>
<button onclick="startAdd()">Create</button>

<script>
    var token = "{{Session::token()}}";
    var baseUrl="{{URL::to('/')}}";
</script>

<script src="{{URL::to('back-end/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{URL::to('back-end/js/species/species.js')}}"></script>