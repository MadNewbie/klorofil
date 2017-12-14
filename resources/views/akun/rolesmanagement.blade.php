@extends('template.template-back-end')

@section('title')
Admin - Pengaturan Peran Pengguna
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title clearfix">
        <h2>{{ $sectiontitle }}</h2>
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
              <input id="nama_jenis_akun" class="form-control" type="text" placeholder="Jenis Peranan"/>
              <input id="nama_layar_jenis_akun" class="form-control" type="text" placeholder="Nama Layar Peranan"/>
                <input id="deskripsi_jenis_akun" class="form-control" type="text" placeholder="Deskripsi Peranan"/>
            </div>
            <div class="form-group">
              <select id="drp_peran_perizinan" class="form-control">
                <option hidden="">Hak Perizinan</option>
                <option>Manipulasi data</option>
                <option>Tinjau data</option>
              </select>
            </div>
            <button id="btnAdd" class="btn btn-primary"  style="margin-bottom: 0px;"><i class="fa fa-plus"></i></button>
          </form>
            <!-- <div class="row">
                <input id="nama_jenis_akun" class="col-md-2" type="text" placeholder="Jenis Akun"/>
                <select id="drp_nilai_jenis_wilayah_akun" class="col-md-2"></select>
                <button id="btnAdd" class="btn btn-primary"><i class="fa fa-plus"></i></button>
            </div> -->
        </div>
    </div>
    <div class="x_content">
      <div class="x_content">
        <form class="form-inline clearfix">
        {{-- @if(count($roles)===0) --}}
        <!-- <div class="form-group">
          <div class="row clearfix"> -->
            <h4 class="text-center">Belum ada data Peranan Pengguna</h4>
          <!-- </div>
        </div> -->
        {{-- @else --}}
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
                            <th class="col-md-3 col-sm-3 col-xs-3">Nama Peranan</th>
                            <th class="col-md-7 col-sm-7 col-xs-7">Perizinan</th>
                            <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0 ?>
                        @foreach($roles as $role)
                        <?php $i++ ?>
                        <tr class="row">
                            <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                            <td class="col-md-3 col-sm-3 col-xs-3">{{$jenis_user->nama_jenis_akun}}</td>
                            <td class="col-md-7 col-sm-7 col-xs-7" data-id="{{$jenis_user->id_jenis_wilayah_user}}">{{$jenis_user->jenisWilayahUser->nama_jenis_wilayah_user}}</td>
                            <td class="col-md-1 col-sm-1 col-xs-1">
                               <div role="group" data-id="{{$jenis_user->id_jenis_user}}" class="btnGroupOperation btn-group btn-group-justified">
                                    <a class="btn btn-success btn-sm btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-sm btn-xs"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tbody>
                        <tr class="row">
                            <td class="col-md-1 col-sm-1 col-xs-1">1</td>
                            <td class="col-md-3 col-sm-3 col-xs-3">Super Administrator</td>
                            <td class="col-md-7 col-sm-7 col-xs-7" data-id="1">Post-All, Update-All, Delete-All</td>
                            <td class="col-md-1 col-sm-1 col-xs-1">
                               <div role="group" data-id="1" class="btnGroupOperation btn-group btn-group-justified btn-group-sm btn-group-xs">
                                    <a class="btn btn-success btn-sm btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-sm btn-xs"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
<script src="{{URL::to('back-end/js/account_management/rolesman.js')}}"></script>
@endsection
