<?php

namespace App\Http\Controllers;

use App\Provinsi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class ProvinsiController extends Controller
{
    public function getIndex() {
        $provinsi = Provinsi::orderBy('negara_id')->paginate(10);
        return view('provinsi.index',['datas'=>$provinsi]);
    }
    
    public function getCreate(){
        return view('test-controller.create-map');
    }
    
    public function postCreate(Request $request){
        $rule = array(
            'name'=>'required|unique:provinsis'
        );
        
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json($validator->errors(),404);
        }else{
            $provinsi = new Provinsi();
            $provinsi->name = $input['name'];
            $provinsi->created_by = 1;
            $provinsi->updated_by = 1;
            $provinsi->negara_id = $input['negara_id'];
            if($provinsi->setDetailAreaAttribute($input['detail_area'])){
                return Response::json(['kode'=>200,'message'=>'Data berhasil tersimpan'],200);
            }
            return Response::json(['kode'=>404,'message'=>'Data tidak berhasil tersimpan'],404);
        }
    }
}
