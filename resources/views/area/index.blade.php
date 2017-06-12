@extends('template.template-back-end')

@section('title')
Admin - Area
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_header">
            <h2>Area</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <button class="btn btn-primary">Tambah</button>
                </div>
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
                                <th class="col-md-3 col-sm-3 col-xs-3">Nama Area</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Provinsi</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Kabupaten / Kota</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Kecamatan</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Kelurahan / Desa</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Detail Wilayah</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">1</td>
                                <td class="col-md-3 col-sm-3 col-xs-3">Area 1</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">Jawa Timur</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">Kota Malang</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">Lowokwaru</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">Mojolangu</td>
                                <td class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-check" style="color: green"></i></td>
                                <td class="col-md-3 col-sm-3 col-xs-3 btn-group-justified">
                                    <a class="btn btn-warning">Ubah</a>
                                    <a class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">2</td>
                                <td class="col-md-3 col-sm-3 col-xs-3">Area 2</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">Jawa Timur</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">Kota Malang</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">Lowokwaru</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">Mojolangu</td>
                                <td class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-times" style="color: red"></i></td>
                                <td class="col-md-3 col-sm-3 col-xs-3">
                                    <div role="group" class="btn-group btn-group-justified">
                                        <a class="btn btn-success" role="button">Area</a>
                                        <a class="btn btn-warning" role="button">Ubah</a>
                                        <a class="btn btn-danger" role="button">Hapus</a>
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