@extends('template.template-back-end')

@section('title')
Admin - Nama Ilmiah
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_header">
            <h2>Nama Ilmiah</h2>
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
                    <input id="nama_ilmiah" class="col-md-2" type="text" placeholder="Nama Ilmiah"/>
                    <input id="masa_jenis" class="col-md-2" type="text" placeholder="Masa Jenis Spesies"/>
                    <button id="btnAdd" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="x_content">
            @if(count($nama_ilmiahs)===0)
            <h4 class="text-center"> Tidak ada data nama ilmiah</h4>
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
                                <th class="col-md-5 col-sm-5 col-xs-5">Nama Ilmiah</th>
                                <th class="col-md-5 col-sm-5 col-xs-5">Masa Jenis</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php $i=0?>
                                @foreach($nama_ilmiahs as $nama_ilmiah)
                                <?php $i++?>
                                <tr class="row">
                                    <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                    <td class="edit_nama_ilmiah col-md-5 col-sm-5 col-xs-5" style="font-style: oblique">{{$nama_ilmiah->nama_ilmiah}}</td>
                                    <td class="edit_masa_jenis col-md-5 col-sm-5 col-xs-5">{{$nama_ilmiah->masa_jenis}}</td>
                                    <td class="col-md-1 col-sm-1 col-xs-1">
                                        <div data-id="{{$nama_ilmiah->id_nama_ilmiah}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
                                            <a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
                @if($nama_ilmiahs->lastPage() > 1)
                <div class="row">
                    <div class="col-sm-12 col-xs-12 text-center">
                        @if($nama_ilmiahs->currentPage() !== 1)
                            <a href="{{$nama_ilmiahs->previousPageUrl()}}"><i class="fa fa-caret-left"></i></a>
                        @endif
                        @if($nama_ilmiahs->currentPage() !== $nama_ilmiahs->lastPage())
                            <a href="{{$nama_ilmiahs->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
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
<script src="{{URL::to('back-end/js/nama_ilmiah/nama_ilmiah.js')}}"></script>
@endsection