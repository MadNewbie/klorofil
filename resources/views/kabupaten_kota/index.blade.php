@extends('template.template-back-end')

@section('title')
Admin - Kabupaten / Kota
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('styles')
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Kabupaten/Kota</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_panel">
            <div class="x_title">
                    <ul class="nav navbar-left panel_toolbox pull-left">
                        <li><a class="collapse-link btn btn-primary"  onclick="displayMap();"><i class="fa fa-plus"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: none">
              <form class="form-inline clearfix">
                    <!-- <div class="col-md-12 col-xs-12 col-sm-12"> -->
                        <div class="form-group">
                        <select class="form-control">
                            <option hidden="">Provinsi</option>
                            <option>Jawa Timur</option>
                            <option>Jawa Barat</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="text" placeholder="Nama Kabupaten/Kota"/>
                      </div>
                        <button class="form-control btn btn-success" style="margin-bottom: 0px;" onclick="btnSimpanOnClick();">Simpan</button>
                    <!-- </div> -->
                    <div class="clearfix"><br /></div>

                  </form>
                </div>
                <div class="form-control" id="map"></div>
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
                                <th class="col-md-5 col-sm-5 col-xs-5">Nama Kabupaten / Kota</th>
                                <th class="col-md-4 col-sm-4 col-xs-4">Provinsi</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Detail Wilayah</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">1</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">Kota Malang</td>
                                <td class="col-md-4 col-sm-4 col-xs-4">Jawa Timur</td>
                                <td class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-check" style="color: green"></i></td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div role="group" class="btn-group btn-group-justified">
                                        <a class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">2</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">Kabupaten Malang</td>
                                <td class="col-md-4 col-sm-4 col-xs-4">Jawa Timur</td>
                                <td class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-times" style="color: red"></i></td>
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

@section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqbtULHt9MCzx6qiqosU40KgeKVylVTL0&callback=initMap" type="text/javascript"></script>
<script src="{{URL::to('general/MapEditor.js')}}"></script>
@endsection
