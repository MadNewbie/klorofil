@extends('template.template-back-end')

@section('title')
Admin - Jenis Cabang
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Jenis Cabang</h2>
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
                    <input id="branch_type_name" class="form-control" type="text" placeholder="Jenis Cabang"/>
                  </div>
                    <button id="btnAdd" class="form-control btn btn-primary" style="margin-bottom: 0px;"><i class="fa fa-plus"></i></button>
                </form>
            </div>
        </div>
        <div class="x_content">
          <div class="x_content">
            <form class="form form-inline clearfix">
            @if(count($datas)===0)
            <h4 class="text-center">Tidak ada data cabang</h4>
            @else
            <div class="row clearfix">
                <div class="dataTables_filter pull-right">
                    <input class="form-control" type="search" placeholder="Cari"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped">
                        <thead>
                            <tr class="row">
                                <th class="col-md-1 col-sm-1 col-xs-1">No</th>
                                <th class="col-md-10 col-sm-10 col-xs-10">Jenis Cabang</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ?>
                            @foreach($datas as $branchType)
                            <?php $i++?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-10 col-sm-10 col-xs-10">{{$branchType->branch_type_name}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div data-id="{{$branchType->id}}" role="group" class="btnGroupOperation btn-group btn-group-justified btn-group-sm btn-group-xs">
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
<script src="{{URL::to('back-end/js/branch_type/branch_type.js')}}"></script>
@endsection
