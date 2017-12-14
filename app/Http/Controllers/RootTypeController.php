<?php

namespace App\Http\Controllers;

use App\Models\DetailPohon\RootType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class RootTypeController extends Controller
{
    public function getIndex() {
        $rootType = RootType::orderBy('root_type_name')->paginate(10);
        return view('akar.index',['datas'=>$rootType]);
    }
    
//    public function getCreate(){
//        return view('test-controller.create');
//    }
    
    public function postCreate(Request $request){
        $rule = array(
            'root_type_name' => 'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json(['kode'=>404,'message'=>$validator->errors()],200);
        }else{
            $rootType = new RootType;
            $rootType->root_type_name = $input['root_type_name'];
            $rootType->created_by = 1;
            $rootType->updated_by = 1;
            if($rootType->save()){
                return Response::json(['kode'=>200,'message'=>'Data berhasil disimpan'],200);
            }
            return Response::json(['kode'=>404,'message'=>'Data tidak berhasil disimpan',200]);
        }
    }
    
    public function getRetrieve() {
        $rootType = RootType::orderBy('root_type_name')->get();
        return Response::json(['root_type'=>$rootType]);
    }
    
    public function postUpdate(Request $request) {
        $rule = array(
            'root_type_name' => 'required|unique:root_types'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return response::json(['kode'=>404,'message'=>$validator->errors()],200);
        }
        $rootType = RootType::find($input['id']);
        if(!$rootType){
            return Response::json(['kode'=>404,'message'=>'Data tidak ditemukan'],200);
        }
        $rootType->root_type_name = ($rootType->root_type_name == $input['root_type_name']? $rootType->root_type_name : $input['root_type_name']);
        $rootType->updated_by = 1;
        $rootType->update();
        return Response::json(['kode'=>200,'message'=>'Data berhasil diubah'],200);
    }
    
    public function getDelete($id) {
        $rootType = RootType::find($id);
        $rootType->delete();
        return Response::json(['message'=>'Data berhasil dihapus','kode'=>200],200);
    }
}
