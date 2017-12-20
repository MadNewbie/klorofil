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
          <div class="x_content">
            <form class="form form-inline">
            @if(count($datas)===0)
            <h4 class="text-center">Tidak ada data spesies</h4>
            @else
            <div class="row clearfix">
                <div class="dataTables_filter pull-right">
                    <input class="form-control" type="search" placeholder="Cari"/>
                </div>
            </div>
            <br />
            <div class="row clearfix">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="row">
                                <th class="col-md-1 col-sm-1 col-xs-1">No</th>
                                <th class="col-md-2 col-sm-2 col-xs-2">ID Spesies</th>
                                <th class="col-md-2 col-sm-2 col-xs-2">Nama Ilmiah</th>
                                <th class="col-md-2 col-sm-2 col-xs-2">Umur Maksimal</th>
                                <th class="col-md-2 col-sm-2 col-xs-2">Warna Bunga</th>
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
                                <td class="col-md-2 col-sm-2 col-xs-2">{{$spesies->species_id}}</td>
                                <td class="col-md-2 col-sm-2 col-xs-2" style="font-style: italic">{{$spesies->scientific_name}}</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">{{$spesies->max_age}}</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">{{$spesies->flower_color}}</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">{{$spesies->flower_bloom_periode}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div data-id="{{$spesies->id}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
                                        <a class="btn btn-warning" data-toggle="modal" data-target="#modal_form" id="btnEdit"><i class="fa fa-pencil"></i></a>
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
          </form>
          </div>
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
              <form class="form form-horizontal">
              <div class="form-group">
                <div class="col-md-4"><label class="control-label" for="drp_species_type">Jenis Spesies</label></div>
                <div class="col-md-8"><select id="drp_species_type" class="form-control" onclick="injectDataMaster(this)"/></select></div>
                <div class="clearfix"><br /></div>
                <div class="col-md-4"><label class="control-label" for="species_id">ID Spesies</label></div>
                <div class="col-md-8"><input id="species_id" class="form-control" disabled="true"/></div>
                <div class="clearfix"><br /></div>
                <div class="col-md-4"><label class="control-label" for="scientific_name">Nama Ilmiah</label></div>
                <div class="col-md-8"><input id="scientific_name" class="form-control" disabled="true"/>
                </div><div class="clearfix"><br /></div>
                <div class="col-md-4"><label class="control-label" for="density">Masa Jenis</label>
                </div><div class="col-md-8"><input id="density" class="form-control" disabled="true" />
                </div><div class="clearfix"><br /></div>
                <div class="col-md-4"><label class="control-label" for="max_age">Umur Maksimal</label>
                </div><div class="col-md-8"><input id="max_age" class="form-control" disabled="true" />
                </div><div class="clearfix"><br /></div>
                <div class="col-md-4"><label class="control-label" for="drp_leaf_type">Jenis Daun</label></div>
                <div class="col-md-8"><select id="drp_leaf_type"class="form-control" disabled="true"></select></div>
                <div class="clearfix"><br /></div>
                <div class="col-md-4"><label class="control-label" for="drp_branch_type">Jenis Cabang</label></div>
                <div class="col-md-8"><select id="drp_branch_type"class="form-control" disabled="true"></select></div>
                <div class="clearfix"><br /></div>
                <div class="col-md-4"><label class="control-label" for="drp_trunk_type">Jenis Batang</label></div>
                <div class="col-md-8"><select id="drp_trunk_type"class="form-control" disabled="true"></select></div>
                <div class="clearfix"></div>
                <div class="col-md-4"><label class="control-label" for="drp_root_type">Jenis Akar</label></div>
                <div class="col-md-8"><select id="drp_root_type"class="form-control" disabled="true"></select></div>
                <div class="clearfix"></div>
                <div class="col-md-4"><label class="control-label" for="drp_function_species_type">Fungsi Spesies</label></div>
                <div class="col-md-8"><select id="drp_function_species_type"class="form-control" disabled="true"></select></div>
                <div class="clearfix"><br /></div>
                <div class="col-md-4"><label class="control-label" for="flower_color">Warna Bunga</label></div>
                <div class="col-md-8"><input id="flower_color" class="form-control" disabled="true"></input></div>
                <div class="clearfix"><br /></div>
                <div class="col-md-4"><label class="control-label" for="flower_crown_shape">Bentuk Kelopak Bunga</label></div>
                <div class="col-md-8"><input id="flower_crown_shape" class="form-control" disabled="true"></input></div>
                <div class="clearfix"><br /></div>
                <div class="col-md-4"><label class="control-label" for="flower_crown_number">Jumlah Kelopak Bunga</label></div>
                <div class="col-md-8"><input id="flower_crown_number" class="form-control" disabled="true" /></div>
                <div class="clearfix"><br /></div>
                <div class="col-md-4"><label class="control-label" for="flower_bloom_periode">Periode Berbunga</label></div>
                <div class="col-md-8"><input id="flower_bloom_periode" class="form-control" disabled="true" /></div>
                <div class="clearfix"><br /></div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnSave">Simpan</button>
          </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{URL::to('back-end/js/helper_backend.js')}}"></script>
<script src="{{URL::to('/back-end/js/species/species.js')}}"></script>
@endsection
