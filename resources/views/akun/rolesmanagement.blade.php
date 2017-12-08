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
    <div class="x_title">
        <h2>Jenis Akun</h2>
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
          <form class="form-inline clearfix">
            <div class="form-group">
              <input id="nama_jenis_akun" class="form-control" type="text" placeholder="Jenis Akun"/>
            </div>
            <div class="form-group">
              <select id="drp_nilai_jenis_wilayah_akun" class="form-control"></select>
            </div>
            <button id="btnAdd" class="form-control btn btn-primary"  style="margin-bottom: 0px;"><i class="fa fa-plus"></i></button>
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
        @if(count($jenis_users)===0)
        <div class="form-group">
          <div class="row clearfix">
            <h4 class="text-center">Tidak ada data jenis user</h4>
          </div>
        </div>
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
                            <th class="col-md-5 col-sm-5 col-xs-5">Jenis Akun</th>
                            <th class="col-md-5 col-sm-5 col-xs-5">Hak Akses</th>
                            <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0 ?>
                        @foreach($jenis_users as $jenis_user)
                        <?php $i++ ?>
                        <tr class="row">
                            <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                            <td class="col-md-5 col-sm-5 col-xs-5">{{$jenis_user->nama_jenis_akun}}</td>
                            <td class="col-md-5 col-sm-5 col-xs-5" data-id="{{$jenis_user->id_jenis_wilayah_user}}">{{$jenis_user->jenisWilayahUser->nama_jenis_wilayah_user}}</td>
                            <td class="col-md-1 col-sm-1 col-xs-1">
                               <div role="group" data-id="{{$jenis_user->id_jenis_user}}" class="btnGroupOperation btn-group btn-group-justified">
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
      </form>
    </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{URL::to('back-end/js/account_management/rolesman.js')}}"></script>
@endsection
