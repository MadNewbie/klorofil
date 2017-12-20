@extends('template.template-back-end')

@section('title')
Admin - Habitat
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Habitat</h2>
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
              <form class="form-horizontal form-label-left clearfix">
                <div class="form-group">
                  <input id="animal_name" class="form-control" type="text" placeholder="Nama Hewan"/>
                  <div class="clearfix"></div>
                  <textarea id="description" rows="7" class="form-control" type="text" style="resize: vertical;" placeholder="Keterangan" rows="1"></textarea>
                  <div class="clearfix"></div><br />
                <div>
                  <button id="btnAdd" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                </div>
              </form>
            </div>
        </div>
        </div>
        <div class="x_content">
          <div class="x_content">
            <form class="form form-inline">
            @if(count($datas)===0)
            <h4 class="text-center">Tidak ada data habitat</h4>
            @else
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
                                <th class="col-md-5 col-sm-5 col-xs-5">Nama Hewan</th>
                                <th class="col-md-5 col-sm-5 col-xs-5">Deskripsi</th>
                                <th class="col-md-1 col-sm-1 col-xs-1"  style="text-align: center;">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ?>
                            @foreach($datas as $habitat)
                            <?php $i++ ?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">{{$habitat->animal_name}}</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">{{$habitat->description}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1"  style="text-align: center;">
                                   <div data-id="{{$habitat->id}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
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
                @if($datas->lastPage() > 1)
                <div class="row clearfix">
                    <div class="col-sm-12 col-xs-12 text-center">
                        @if($datas->currentPage() !== 1)
                            <a href="{{$datas->previousPageUrl()}}"><i class="fa fa-caret-left"></i></a>
                        @endif
                        @if($datas->currentPage() !== $datas->lastPage())
                            <a href="{{$datas->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
                        @endif
                    </div>
                </div>
                @endif
            @endif
          </form>
        </div>
      </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{URL::to('back-end/js/helper_backend.js')}}"></script>
<script src="{{URL::to('back-end/js/habitat/habitat.js')}}"></script>
@endsection
