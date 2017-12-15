@extends('template.template-back-end')

@section('title')
Admin - Pendaftaran Pengguna
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <!-- <div class="x_header"> -->
        <div class="x_title clearfix">
            <h2>{{ $sectiontitle }}</h2>
            <!-- <div class="clearfix"></div> -->
        </div>
        <div class="x_panel">
            <div class="x_title">
                    <ul class="nav navbar-left panel_toolbox pull-left">
                        <li><a class="collapse-link btn btn-primary"><i class="fa fa-plus"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: none">
              <form class="form form-horizontal clearfix">
                <div class="form-group">
                  <input id="accountFullname" class="form-control" type="text" style="margin-bottom: 0px;" placeholder="Nama Lengkap"/>
                <!-- </div> -->
                <!-- <div class="form-group"> -->
                    <input id="accountUsername" class="form-control" type="text" style="margin-bottom: 0px;" placeholder="Username"/>
                <!-- </div> -->
                <div class="form-group">
                  <select class="form-control" style="margin-bottom: 0px;">
                        <option hidden="">Hak Akses</option>
                        <option>Administrator</option>
                        <option>Operator (Provinsi)</option>
                        <option>Operator (Kabupaten/Kota)</option>
                        <option>Operator (Kecamatan)</option>
                        <option>Operator (Kelurahan/Desa)</option>
                        <option>Operator (Area)</option>
                  </select>
                </div>
                  <button id="btnAdd" class="form-control btn btn-primary btn-sm" style="margin-bottom: 0px;"><i class="fa fa-plus"></i></button>
              </form>
            </div>
          </div>
        </div>
        <div class="x_content">
          <div class="x_content">
            <form class="form-inline clearfix">
            {{-- @if(count($datas)===0) --}}
            <!-- <div class="form-group">
              <div class="row clearfix"> -->
                <h4 class="text-center">Belum ada data Pengguna</h4>
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
            <!-- </div> -->
                <div class="row clearfix">
                <!-- <div class="form-group clearfix"> -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="row">
                                <th class="col-md-1 col-sm-1 col-xs-1">No</th>
                                <th class="col-md-5 col-sm-5 col-xs-5">Nama Lengkap</th>
                                <th class="col-md-2 col-sm-2 col-xs-2">Username</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Tingkatan</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $i=0 ?>
                          @foreach($datas as $user)
                          <?php $i++ ?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">{{$user->nama}}</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">{{$user->username}}</td>
                                <td class="col-md-3 col-sm-3 col-xs-3">{{$user->role->display_name}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div role="group" class="btn-group btn-group-justified btn-group-sm btn-group-xs">
                                        <a class="btn btn-success btn-sm btn-xs" data-toggle="tooltip" title="Reset Password"><i class="fa fa-undo"></i></a>
                                        <a class="btn btn-warning btn-sm btn-xs" data-toggle="tooltip" title="Edit Akun"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm btn-xs" data-toggle="tooltip" title="Hapus Akun"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">1</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">Rachmad Yanuarianto</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">rachmad.y</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">Operator (Kabupaten/Kota)</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div role="group" class="btn-group btn-group-justified btn-group-sm btn-group-xs">
                                        <a class="btn btn-success btn-sm btn-xs" data-toggle="tooltip" title="Reset Password"><i class="fa fa-undo" aria-hidden="true"></i></a>
                                        <a class="btn btn-warning btn-sm btn-xs" data-toggle="tooltip" title="Edit Akun"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm btn-xs" data-toggle="tooltip" title="Hapus Akun"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
            {{-- @endif --}}
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{URL::to('back-end/js/account_management/usersman.js')}}"></script>
@endsection
