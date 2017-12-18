@extends('template.template-back-end')

@section('title')
Admin - Jenis Pelakuan
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Jenis Perlakuan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                    <ul class="nav navbar-left panel_toolbox pull-left">
                        <li><a class="collapse-link btn btn-primary"><i class="fa fa-plus"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: none">
                <div class="row">
                    <input id="nama_jenis_perlakuan" class="col-md-2" type="text" placeholder="Jenis Perlakuan"/>
                    <button id="btnAdd" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="x_content">
            @if(count($jenis_perlakuans)===0)
            <h4 class="text-center">Tidak ada data jenis perlakuan</h4>
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
                                <th class="col-md-10 col-sm-10 col-xs-10">Jenis Perlakuan</th>
                                <th class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0?>
                            @foreach($jenis_perlakuans as $jenis_perlakuan)
                            <?php $i++ ?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-10 col-sm-10 col-xs-10">{{$jenis_perlakuan->nama_jenis_perlakuan}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;">
                                   <div data-id="{{$jenis_perlakuan->id_jenis_perlakuan}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
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
                @if($jenis_perlakuans->lastPage() > 1)
                <div class="row">
                    <div class="col-sm-12 col-xs-12 text-center">
                        @if($jenis_perlakuans->currentPage() !== 1)
                            <a href="{{$jenis_perlakuans->previousPageUrl()}}"><i class="fa fa-caret-left"></i></a>
                        @endif
                        @if($jenis_perlakuans->currentPage() !== $jenis_perlakuans->lastPage())
                            <a href="{{$jenis_perlakuans->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
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
<script src="{{URL::to('back-end/js/jenis_perlakuan/jenis_perlakuan.js')}}"></script>
@endsection
