@extends('template.template-back-end')

@section('title')
Admin - Nama Lokal
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_header">
            <h2>Nama Lokal</h2>
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
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <select id="nama_ilmiah" class="col-md-2">
<!--                            <option hidden="true">Nama Ilmiah</option>
                            <option style="font-style: oblique">Nama Ilmiah 1</option>-->
                        </select>
                        <input id="nama_lokal" class="col-md-2" type="text" placeholder="Nama Lokal"/>
                        <button id="btnAdd" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div id="map"></div>
            </div>
        </div>
        <div class="x_content">
            @if(count($nama_lokals)===0)
            <h4 class="text-center">Tidak ada nama lokal</h4>
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
                                <th class="col-md-5 col-sm-5 col-xs-5">Nama Lokal</th>
                                <th class="col-md-5 col-sm-5 col-xs-5">Nama Ilmiah</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ?>
                            @foreach($nama_lokals as $nama_lokal)
                            <?php $i++?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">{{$nama_lokal->nama_lokal}}</td>
                                <td class="col-md-5 col-sm-5 col-xs-5" style="font-style: oblique" data-id="{{$nama_lokal->id_nama_ilmiah}}">{{$nama_lokal->namaIlmiah->nama_ilmiah}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div data-id="{{$nama_lokal->id_nama_lokal}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
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
                @if($nama_lokals->lastPage() > 1)
                <div class="row">
                    <div class="col-sm-12 col-xs-12 text-center">
                        @if($nama_lokals->currentPage() !== 1)
                            <a href="{{$nama_lokals->previousPageUrl()}}"><i class="fa fa-caret-left"></i></a>
                        @endif
                        @if($nama_lokals->currentPage() !== $nama_lokals->lastPage())
                            <a href="{{$nama_lokals->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
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
<script src="{{URL::to('back-end/js/nama_lokal/nama_lokal.js')}}"></script>
@endsection
