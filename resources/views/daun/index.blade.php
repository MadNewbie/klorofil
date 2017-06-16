@extends('template.template-back-end')

@section('title')
Admin - Daun
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Jenis Daun</h2>
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
                    <input class="col-md-2" type="text" placeholder="Jenis Daun"/>
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
                                <th class="col-md-10 col-sm-10 col-xs-10">Jenis Daun</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">1</td>
                                <td class="col-md-10 col-sm-10 col-xs-10">Jenis Daun 1</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div role="group" class="btn-group btn-group-justified">
                                        <a class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger"><i class="fa fa-trash"></i></a>
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