@extends('template.template-back-end')

@section('title')
Admin - Jenis Wilayah Akun
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Jenis Wilayah Akun</h2>
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
                    <input id="nama_jenis_wilayah_akun" class="col-md-2" type="text" placeholder="Jenis Wilayah Akun"/>
                    <select id="drp_nilai_jenis_wilayah_akun" class="col-md-2"></select>
                    <button id="btnAdd" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="x_content">
            @if(count($jenis_wilayah_users)===0)
            <h4 class="text-center">Tidak ada data jenis wilayah akun</h4>
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
                                <th class="col-md-5 col-sm-5 col-xs-5">Jenis Wilayah Akun</th>
                                <th class="col-md-5 col-sm-5 col-xs-5">Tingkatan Wilayah Akun</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ?>
                            @foreach($jenis_wilayah_users as $jenis_wilayah_user)
                            <?php $i++?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">{{$jenis_wilayah_user->nama_jenis_wilayah_user}}</td>
                                <td class="col-md-5 col-sm-5 col-xs-5" data-id="{{$jenis_wilayah_user->nilai}}">{{$jenis_wilayah_user->nilai}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div data-id="{{$jenis_wilayah_user->id_jenis_wilayah_user}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
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
                @if($jenis_wilayah_users->lastPage() > 1)
                <div class="row">
                    <div class="col-sm-12 col-xs-12 text-center">
                        @if($jenis_wilayah_users->currentPage() !== 1)
                            <a href="{{$jenis_wilayah_users->previousPageUrl()}}"><i class="fa fa-caret-left"></i></a>
                        @endif
                        @if($jenis_wilayah_users->currentPage() !== $jenis_wilayah_users->lastPage())
                            <a href="{{$jenis_wilayah_users->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
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
<script src="{{URL::to('back-end/js/jenis_wilayah_user/jenis_wilayah_user.js')}}"></script>
@endsection