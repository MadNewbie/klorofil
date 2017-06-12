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
                                <th class="col-md-8 col-sm-8 col-xs-8">Jenis Penyakit</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">1</td>
                                <td class="col-md-8 col-sm-8 col-xs-8">Jenis Penyakit 1</td>
                                <td class="col-md-3 col-sm-3 col-xs-3">
                                    <button class="col-md-4 col-sm-4 col-xs-4 btn btn-warning">Ubah</button>
                                    <button class="col-md-4 col-sm-4 col-xs-4 btn btn-danger">Hapus</button>
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
