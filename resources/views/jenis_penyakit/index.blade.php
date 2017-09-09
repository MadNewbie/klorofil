@extends('template.template-back-end')

@section('title')
Admin - Jenis Penyakit
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Jenis Penyakit</h2>
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
                        <input id="nama_jenis_penyakit" class="col-md-2" type="text" placeholder="Nama Penyakit"/>
                        <button id="btnAdd" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="x_content">
            @if(count($jenis_penyakits)==0)
            <h4 class="text-center">Tidak ada data jenis penyakit</h4>
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
                                <th class="col-md-10 col-sm-10 col-xs-10">Jenis Penyakit</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ?>
                            @foreach($jenis_penyakits as $jenis_penyakit)
                            <?php $i++ ?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-10 col-sm-10 col-xs-10">{{$jenis_penyakit->nama_jenis_penyakit}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div data-id="{{$jenis_penyakit->id_jenis_penyakit}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
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
                @if($jenis_penyakits->lastPage() > 1)
                <div class="row">
                    <div class="col-sm-12 col-xs-12 text-center">
                        @if($jenis_penyakits->currentPage() !== 1)
                            <a href="{{$jenis_penyakits->previousPageUrl()}}"><i class="fa fa-caret-left"></i></a>
                        @endif
                        @if($jenis_penyakits->currentPage() !== $jenis_penyakits->lastPage())
                            <a href="{{$jenis_penyakits->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
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
<script src="{{URL::to('back-end/js/jenis_penyakit/jenis_penyakit.js')}}"></script>
@endsection