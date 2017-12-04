@extends('template.template-back-end')

@section('title')
Admin - Pelakuan
@endsection

@section('name')
Moh. Ardiansyah
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Perlakuan</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_panel">
            <div class="x_title clearfix">
                    <ul class="nav navbar-left panel_toolbox pull-left">
                        <li><a class="collapse-link btn btn-primary"><i class="fa fa-plus"></i></a></li>
                    </ul>
            </div>
            <div class="x_content" style="display: none">
              <form class="form-inline clearfix">
                <div class="form-group">
                  <select id="drp_species_type" class="form-control" tabindex="-1">
                  </select>
                <!-- </div>
                <div class="form-group"> -->
                  <input id="spesies_perlakuan" class="form-control" type="text" placeholder="Perlakuan"/>
                </div>
                <button id="btnAdd" class="form-control btn btn-primary"  style="margin-bottom: 0px;"><i class="fa fa-plus"></i>Tambah</button>
              </form>
            </div>
        </div>
        <div class="x_content">
            @if(count($datas)===0)
            <h4 class="text-center">Tidak ada data perlakuan</h4>
            @else
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
                                <th class="col-md-5 col-sm-5 col-xs-5">Nama Perlakuan</th>
                                <th class="col-md-5 col-sm-5 col-xs-5">Jenis Perlakuan</th>
                                <th class="col-md-1 col-sm-1 col-xs-1">Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0 ?>
                            @foreach($datas as $perlakuan)
                            <?php $i++ ?>
                            <tr class="row">
                                <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                                <td class="col-md-5 col-sm-5 col-xs-5">{{$perlakuan->name}}</td>
                                <td class="col-md-5 col-sm-5 col-xs-5" data-id="{{$perlakuan->species_type_id}}">{{$perlakuan->speciesType->species_type_name}}</td>
                                <td class="col-md-1 col-sm-1 col-xs-1">
                                   <div data-id="{{$perlakuan->id}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
                                        <a class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{URL::to('back-end/js/treatment/treatment.js')}}"></script>
@endsection
