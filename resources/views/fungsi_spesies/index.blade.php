@extends('template.template-back-end')

@section('title')
Admin - Fungsi Spesies
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Fungsi Spesies</h2>
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
                    <select id="drp_species_type" class="form-control"></select>
                  <!-- </div>
                  <div class="form-group"> -->
                    <input id="function_type_species" class="form-control" type="text" placeholder="Fungsi Spesies"/>
                  </div>
                  <button id="btnAdd" class="form-control btn btn-primary btn-xs" style="margin-bottom: 0px;"><i class="fa fa-plus"></i></button>
              </form>
            </div>
        </div>
        <div class="x_content">
          <div class="x_content">
            <form class="form form-inline clearfix">
              @if(count($datas)===0)
              <h4 class="text-center">Tidak ada data fungsi spesies</h4>
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
                                <th class="col-md-5 col-sm-5 col-xs-5">Fungsi Jenis Spesies</th>
                                <th class="col-md-5 col-sm-5 col-xs-5">Jenis Spesies</th>
                                <th class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ?>
                            @foreach($datas as $functionTypeSpecies)
                            <?php $i++ ?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">{{$functionTypeSpecies->function_type_species}}</td>
                                <td class="col-md-5 col-sm-5 col-xs-5" data-id='{{$functionTypeSpecies->species_type_id}}'>{{$functionTypeSpecies->speciesType->species_type_name}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1" style="text-align: center;">
                                   <div data-id="{{$functionTypeSpecies->id}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
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
                <div class="row">
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
<script src="{{URL::to('back-end/js/function_type_species/function_type_species.js ')}}"></script>
@endsection
