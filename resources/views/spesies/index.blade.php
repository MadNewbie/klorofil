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
        <div class="x_title">
            <h2>Spesies</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_panel">
          <div class="x_title">
            <ul class="nav navbar-left panel_toolbox pull-left">
                <li><a data-toggle="modal" data-target="#modal_form" class="btn btn-primary" id="btnForm"><i class="fa fa-plus"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="x_content">
            @if(count($datas)===0)
            <h4 class="text-center">Tidak ada data spesies</h4>
            @else
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 dataTables_filter">
                    <input type="search" placeholder="Cari"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr class="row">
                                <th class="col-md-1 col-sm-1 col-xs-1">No</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">ID Spesies</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Nama Ilmiah</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Umur Maksimal</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Warna Bunga</th>
                                <th class="col-md-2 col-sm-2 col-xs-2">Periode Mekar</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0?>
                            @foreach($datas as $spesies)
                            <?php $i++?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$spesies->species_id}}</td>
                                <td class="col-md-3 col-sm-3 col-xs-3">{{$spesies->scientific_name}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$spesies->max_age}}</td>
                                <td class="col-md-3 col-sm-3 col-xs-3">{{$spesies->flower_color}}</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">{{$spesies->flower_bloom_periode}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div data-id="{{$spesies->id}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
                                        <a class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
                @if($datas->lastPage() > 1)
                <div class="row">
                    <div class="col-sm-12 col-xs-12 text-center">
                        @if($datas->currentPage() !== 1)
                            <a href="{{$datas->previousPageUrl()}}"><i class="fa fa-caret-left"></i></a>
                        @endif
                        @if($datas->currentPage() !== $datas->lastPage())
                            <a href="{{$datas->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
                        @endif
                    </div>
                </div>
                @endif
            @endif
        </div>
    </div>
</div>
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="modal_form_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal_form_label">Form Spesies</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
            </div>
            <div>
                <button type="button" class="btn btn-primary" id="btnAdd"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{URL::to('/back-end/js/species/species.js')}}"></script>
@endsection
