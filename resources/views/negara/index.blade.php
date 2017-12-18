@extends('template.template-back-end')

@section('title')
Admin - Negara
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
      <!-- <div class="x_header clearfix"> -->
      <div class="x_title clearfix">
          <h2>{{ $sectiontitle }}</h2>
      </div>
      <div class="x_panel">
        <div class="x_title">
          <ul class="nav navbar-left panel_toolbox pull-left">
            <li><a class="collapse-link btn btn-primary" onclick="displayMap(this);"><i class="fa fa-plus"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div id="form_add" class="x_content" style="display: none">
          <form class="form-inline clearfix">
            <div class="form-group" style="margin-bottom: 0px;">
              <input id="nama_negara" class="form-control" type="text" placeholder="Nama Negara"/>
            </div>
            <button class="form-control btn btn-success" style="margin-bottom: 0px;" onclick="startAdd(this)">Simpan</button>
            <div class="clearfix"><br /></div>
            <div class="form-control" id="map"></div>
          </form>
        </div>
            <!-- <div class="form-control" id="map"></div> -->
       </div>
       <div class="x_content">
         <div class="x_content">
           <form class="form form-inline clearfix">
          {{-- @if(count($datas)===0) --}}
            <h4 class="text-center">Belum ada data mengenai {{ $sectiontitle }}</h4>
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
                        <th class="col-md-8 col-sm-8 col-xs-8">Nama Negara</th>
                        <th class="col-md-2 col-sm-2 col-xs-2">Detail Wilayah</th>
                        <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=0?>
                      @foreach($datas as $negara)
                      <?php $i++?>
                      <tr class="row">
                        <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                        <td class="col-md-10 col-sm-10 col-xs-10">{{$negara->name}}</td>
                        <td class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;"><i class="fa fa-times" style="color: red"></i></td>
                        <td class="col-md-1 col-sm-1 col-xs-1">
                            <div data-id="{{$negara->id}}" role="group" class="btnGroupOperation btn-group btn-group-justified btn-group-sm btn-group-xs">
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

@endsection

@section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqbtULHt9MCzx6qiqosU40KgeKVylVTL0&callback=initMap" type="text/javascript"></script>
<script src="{{URL::to('general/MapEditor.js')}}"></script>
<script src="{{URL::to('back-end/js/negara/negara.js')}}"></script>
@endsection
