@extends('template.template-back-end')

@section('title')
Admin - Pengaturan Perizinan Pengguna
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="containter-fluid">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title clearfix">
            <h2>{{ $sectiontitle }}</h2>
        </div>
        <div class="x_panel">
            <div class="x_title">
                    <ul class="nav navbar-left panel_toolbox">
                        <li><a class="collapse-link btn btn-primary"><i class="fa fa-plus"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: none">
              <form class="form form-horizontal clearfix">
                <div class="form-group">
                  <input id="nama_jenis_izin" class="form-control col-xs-12 col-sm-6 col-md-4" type="text" placeholder="Jenis Perizinan"/>
                <!-- </div>
                <div class="form-group"> -->
                  <input id="nama_layar_jenis_izin" class="form-control col-xs-12 col-sm-6 col-md-8" type="text" placeholder="Nama Layar Perizinan"/>
                <!-- </div>
                <div class="form-group"> -->
                    <input id="deskripsi_jenis_izin" class="form-control col-xs-12 col-sm-12 col-md-12" type="text" placeholder="Deskripsi Perizinan"/>
                </div>
                <button id="btnAdd" class="btn btn-primary"  style="margin-bottom: 0px;"><i class="fa fa-plus"></i></button>
              </form>
            </div>
        </div>
        <div class="x_content">
          <div class="x_content">
            <form class="form form-inline clearfix">
              {{-- @if(count($datas)===0) --}}
              <!-- <div class="form-group">
                <div class="row clearfix"> -->
                  <h4 class="text-center">Belum ada data Perizinan Pengguna</h4>
                <!-- </div>
              </div> -->
              {{-- @else --}}
              <div class="form-group">
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
                                <th class="col-md-2 col-sm-2 col-xs-2">Jenis Perizinan</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Nama Layar Perizinan</th>
                                <th class="col-md-5 col-sm-5 col-xs-5">Deskripsi</th>
                                <th class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">1</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">Rachmad Yanuarianto</td>
                                <td class="col-md-3 col-sm-3 col-xs-3">rachmad.y</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">Operator (Kabupaten/Kota)</td>
                                <td class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;">
                                   <div role="group" class="btnGroupOperation btn-group btn-group-justified btn-group-sm btn-group-xs">
                                        <a class="btn btn-warning btn-sm btn-xs" data-toggle="tooltip" title="Edit Akun"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm btn-xs" data-toggle="tooltip" title="Hapus Akun"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tbody>
                          <?php $i=0?>
                          @foreach($datas as $permission)
                          <?php $i++?>
                          <tr class="row">
                            <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                            <td class="col-md-2 col-sm-2 col-xs-2">{{$permission->name}}</td>
                            <td class="col-md-3 col-sm-3 col-xs-3">{{$permission->display_name}}</td>
                            <th class="col-md-5 col-sm-5 col-xs-5">{{$permission->description}}</th>
                            <td class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;">
                                <div data-id="{{$negara->id}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
                                    <a class="btn btn-warning btn-sm btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-sm btn-xs"><i class="fa fa-trash"></i></a>
                                </div>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              {{-- @endif --}}
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{URL::to('back-end/js/account_management/permissionsman.js')}}"></script>
@endsection
