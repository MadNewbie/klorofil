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
    <a href="{{Route('negara.getCreate')}}">Create</a>
    @if(count($datas)===0)
    <h3>Tidak Ada Data</h3>
    @else
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="row">
                        <th col-md-1 col-sm-1 col-xs-1>No</th>
                        <th col-md-10 col-sm-10 col-xs-10>Nama Negara</th>
                        <th col-md-1 col-sm-1 col-xs-1>Operasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0?>
                    @foreach($datas as $negara)
                    <?php $i++?>
                    <tr class="row">
                        <td class="col-md-1 col-sm-1 col-xs-1">{{$i}}</td>
                        <td class="col-md-10 col-sm-10 col-xs-10">{{$negara->name}}</td>
                        <td class="col-md-1 col-sm-1 col-xs-1">
                            <div data-id="{{$negara->id}}" role="group" class="btnGroupOperation btn-group btn-group-justified">
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
    @endif
@endsection