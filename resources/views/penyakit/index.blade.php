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
                    <select id="jenis_penyakit" class="col-md-2"></select>
                    <input id="nama_penyakit" class="col-md-2" type="text" placeholder="Nama Penyakit"/>
                    <input id="bobot" class="col-md-2" type="text" placeholder="Bobot Nilai"/>
                    <button id="btnAdd" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="x_content">
            @if(count($penyakits)===0)
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
                                <th class="col-md-4 col-sm-4 col-xs-4">Nama Penyakit</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Jenis Penyakit</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Bobot</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0?>
                            @foreach($penyakits as $penyakit)
                            <?php $i++?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-4 col-sm-4 col-xs-4">{{$penyakit->nama_penyakit}}</td>
                                <td class="col-md-3 col-sm-3 col-xs-3" data-id="{{$penyakit->id_jenis_penyakit}}">{{$penyakit->jenisPenyakit->nama_jenis_penyakit}}</td>
                                <td class="col-md-3 col-sm-3 col-xs-3">{{$penyakit->bobot}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div data-id="{{$penyakit->id_penyakit}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
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
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{URL::to('/back-end/js/penyakit/penyakit.js')}}"></script>
@endsection