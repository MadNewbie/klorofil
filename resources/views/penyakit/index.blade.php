@extends('template.template-back-end')

@section('title')
Admin - Penyakit
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Penyakit</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                    <ul class="nav navbar-left panel_toolbox">
                        <li><a class="collapse-link btn btn-primary"><i class="fa fa-plus"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: none">
                <div class="row">
                    <select id="drp_species_type" class="col-md-2" onchange="changeSpeciesTypeOption();"></select>
                    <select id="drp_disease_type" class="col-md-2" disabled="true"></select>
                    <input id="name" class="col-md-2" type="text" placeholder="Nama Penyakit" disabled="true"/>
                    <input id="weight" class="col-md-2" type="text" placeholder="Bobot Nilai" disabled="true"/>
                    <button id="btnAdd" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="x_content">
            @if(count($datas)===0)
            <h4 class="text-center">Tidak ada data penyakit</h4>
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
                                <th class="col-md-3 col-sm-3 col-xs-3">Nama Penyakit</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Jenis Penyakit</th>
                                <th class="col-md-2 col-sm-2 col-xs-2">Jenis Spesies</th>
                                <th class="col-md-2 col-sm-2 col-xs-2">Bobot</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0?>
                            @foreach($datas as $penyakit)
                            <?php $i++?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-3 col-sm-3 col-xs-3">{{$penyakit->name}}</td>
                                <td class="col-md-3 col-sm-3 col-xs-3" data-id="{{$penyakit->disease_type_id}}">{{$penyakit->diseaseType->name}}</td>
                                <td class="col-md-2 col-sm-2 col-xs-2" data-id="{{$penyakit->diseaseType->speciesType->id}}">{{$penyakit->diseaseType->speciesType->species_type_name}}</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">{{$penyakit->weight}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div data-id="{{$penyakit->id}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
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
@endsection

@section('scripts')
<script src="{{URL::to('/back-end/js/penyakit/penyakit.js')}}"></script>
@endsection