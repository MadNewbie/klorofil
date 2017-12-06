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
        <div class="x_header">
            <h2>Akun</h2>
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
                    <input class="col-md-2" type="text" placeholder="Nama Lengkap"/>
                    <input class="col-md-2" type="text" placeholder="Username"/>
                    <select>
                        <option hidden="">Hak Akses</option>
                        <option>Administrator</option>
                        <option>Operator (Provinsi)</option>
                        <option>Operator (Kabupaten/Kota)</option>
                        <option>Operator (Kecamatan)</option>
                        <option>Operator (Kelurahan/Desa)</option>
                        <option>Operator (Area)</option>
                    </select>
                    <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="x_content">
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
                                <th class="col-md-5 col-sm-5 col-xs-5">Nama Lengkap</th>
                                <th class="col-md-2 col-sm-2 col-xs-2">Username</th>
                                <th class="col-md-2 col-sm-2 col-xs-2">Tingkatan</th>
                                <th class="col-md-2 col-sm-2 col-xs-2">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">1</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">Moh. Ardiansyah</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">moh_ardiahsyah</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">Administrator</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">
                                   <div role="group" class="btn-group btn-group-justified">
                                        <a class="btn btn-warning" data-toggle="tooltip" title="Reset Password"><i class="fa fa-undo"></i></a>
                                        <a class="btn btn-success" data-toggle="tooltip" title="Edit Akun"><i class="fa fa-pencil"></i></a>
<!--                                        <a class="btn btn-danger"><i class="fa fa-trash"></i></a>-->
                                    </div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">2</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">Rachmad Yanuarianto</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">rachmad.y</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">Operator (Kabupaten/Kota)</td>
                                <td class="col-md-2 col-sm-2 col-xs-2">
                                   <div role="group" class="btn-group btn-group-justified">
                                        <a class="btn btn-warning" data-toggle="tooltip" title="Reset Password"><i class="fa fa-undo"></i></a>
                                        <a class="btn btn-success" data-toggle="tooltip" title="Edit Akun"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger" data-toggle="tooltip" title="Hapus Akun"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
