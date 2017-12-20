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
        <div class="x_title clearfix">
            <h2>{{$sectiontitle}}</h2>
            <!-- <div class="clearfix"></div> -->
        </div>
        <div class="x_panel">
            <div class="x_title">
                    <ul class="nav navbar-left panel_toolbox pull-left">
                        <li><a class="collapse-link btn btn-primary" onclick="displayMap();"><i class="fa fa-plus"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: none">
              <form class="form form-inline clearfix">
                    <!-- <div class="col-md-12 col-xs-12 col-sm-12"> -->
                      <div class="form-group" style="margin-bottom: 0px;">
                        <select class="form-control">
                            <option hidden="">Provinsi</option>
                            <option>Jawa Timur</option>
                            <option>Jawa Barat</option>
                        </select>
                      </div>
                      <div class="form-group" style="margin-bottom: 0px;">
                        <input class="form-control" type="text" placeholder="Nama Kabupaten/Kota"/>
                      </div>
                        <button class="form-control btn btn-success" style="margin-bottom: 0px;" onclick="btnSimpanOnClick();">Simpan</button>
                    <!-- </div> -->
                    <div class="clearfix"><br /></div>
                    <div class="form-control" id="map"></div>
                  </form>
                </div>
                <!-- <div class="form-control" id="map"></div> -->
              </div>
        <div class="x_content">
          <div class="x_content">
            <form class="form form-inline clearfix">
              {{-- @if(count($datas)===0)--}}
              <h4 class="text-center">Belum ada data mengenai {{$sectiontitle}}</h4>
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
                                <th class="col-md-5 col-sm-5 col-xs-5">Nama Kabupaten / Kota</th>
                                <th class="col-md-3 col-sm-3 col-xs-3">Provinsi</th>
                                <th class="col-md-2 col-sm-2 col-xs-2" style="text-align: center;">Detail Wilayah</th>
                                <th class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">1</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">Kota Malang</td>
                                <td class="col-md-3 col-sm-3 col-xs-3">Jawa Timur</td>
                                <td class="col-md-2 col-sm-2 col-xs-2" style="text-align: center;"><i class="fa fa-check" style="color: green"></i></td>
                                <td class="col-md-1 col-sm-1 col-xs-1  style="text-align: center;"">
                                   <div role="group" class="btnGroupOperation btn-group btn-group-justified btn-group-sm btn-group-xs">
                                        <a class="btn btn-warning btn-sm btn-xs"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm btn-xs"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">2</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">Kabupaten Malang</td>
                                <td class="col-md-3 col-sm-3 col-xs-3">Jawa Timur</td>
                                <td class="col-md-2 col-sm-2 col-xs-2" style="text-align: center;"><i class="fa fa-times" style="color: red"></i></td>
                                <td class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;">
                                    <div role="group" class="btnGroupOperation btn-group btn-group-justified">
                                        <a class="btn btn-warning btn-sm btn-xs"><i class="fa fa-pencil"></i></a>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqbtULHt9MCzx6qiqosU40KgeKVylVTL0&callback=initMap" type="text/javascript"></script>
<script src="{{URL::to('general/MapEditor.js')}}"></script>
@endsection
