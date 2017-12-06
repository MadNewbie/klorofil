@extends('template.template-back-end')

@section('title')
Admin - Spesies
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title clearfix">
            <h2>Form Spesies</h2>
            <!-- <div class="clearfix"></div> -->
        </div>
        <div class="x_content">
          <form class="form-inline">
            <div class="col-md-4">Jenis Spesies</div><select id="drp_species_type"class="col-md-8"/></select><div class="clearfix"></div>
            <div class="col-md-4">ID Spesies</div><input id="species_id" class="col-md-8"/><div class="clearfix"></div>
            <div class="col-md-4">Nama Ilmiah</div><input id="scientific_name" class="col-md-8"/><div class="clearfix"></div>
            <div class="col-md-4">Masa Jenis</div><input id="density" class="col-md-8"/><div class="clearfix"></div>
            <div class="col-md-4">Umur Maksimal</div><input id="max_age" class="col-md-8"/><div class="clearfix"></div>
            <div class="col-md-4">Jenis Daun</div><select id="drp_leaf_type"class="col-md-8"/></select><div class="clearfix"></div>
            <div class="col-md-4">Jenis Cabang</div><select id="drp_branch_type"class="col-md-8"/></select><div class="clearfix"></div>
            <div class="col-md-4">Jenis Batang</div><select id="drp_trunk_type"class="col-md-8"/></select><div class="clearfix"></div>
            <div class="col-md-4">Jenis Akar</div><select id="drp_root_type"class="col-md-8"/></select><div class="clearfix"></div>
            <div class="col-md-4">Fungsi Spesies</div><select id="drp_function_species_type"class="col-md-8"/></select><div class="clearfix"></div>
            <div class="col-md-4">Warna Bunga</div><input id="flower_color" class="col-md-8"/><div class="clearfix"></div>
            <div class="col-md-4">Bentuk Kelopak Bunga</div><input id="flower_crown_shape" class="col-md-8"/><div class="clearfix"></div>
            <div class="col-md-4">Jumlah Kelopak Bunga</div><input id="flower_crown_number" class="col-md-8"/><div class="clearfix"></div>
            <div class="col-md-4">Periode Berbunga</div><input id="flower_bloom_periode" class="col-md-8"/><div class="clearfix"></div>
            <!-- <i class="fa fa-plus"></i> -->
          </form>
        </div>
    </div>
</div>
@endsection
