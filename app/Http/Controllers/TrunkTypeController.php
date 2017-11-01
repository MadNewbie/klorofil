<?php

namespace App\Http\Controllers;

use App\TrunkType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class TrunkTypeController extends Controller
{
    public function getIndex() {
        $trunkType = TrunkType::orderBy('trunk_type_name')->paginate(10);
        return view('batang.index',['datas'=>$trunkType]);
    }
    
    public function getCreate() {
        return view('test-controller.create');
    }
    
    public function postCreate(Request $request) {
        $rule = array(
            'trunk_type_name'=>'required|unique:trunk_types'
        );
        $input = $request->all();
        $validation = Validator::make($input,$rule);
        if($validation->fails()){
            return Response::json(['kode'=>404,'message'=>$validation->errors()],200);
        }else{
            $trunkType = new TrunkType();
            $trunkType->trunk_type_name = $input['trunk_type_name'];
            $trunkType->created_by = 1;
            $trunkType->updated_by = 1;
            if($trunkType->save()){
                return Response::json(['kode'=>200,'message'=>'Data berhasil disimpan'],200);
            }else{
                return Response::json(['kode'=>404,'message'=>'Data tidak berhasil disimpan'],200);
            }
        }
    }
    
    public function getRetrieve() {
        $trunkType = TrunkType::orderBy('trunk_type_name')->get();
        return Response::json(['trunk_type'=>$trunkType]);
    }
    
    public function postUpdate(Request $request) {
        $rule = array(
            'trunk_type_name'=>'required'
        );
        $input = $request->all();
        $validation = Validator::make($input,$rule);
        if($validation->fails()){
            return Response::json(['kode'=>404,'message'=>$validation->errors()],200);
        }else{
            $trunkType = TrunkType::find($input['id']);
            $trunkType->trunk_type_name = ($trunkType->trunk_type_name==$input['trunk_type_name']?$trunkType->trunk_type_name:$input['trunk_type_name']);
            $trunkType->updated_by = 1;
            if($trunkType->update()){
                return Response::json(['kode'=>200,'message'=>'Data berhasil diubah'],200);
            }else{
                return Response::json(['kode'=>404,'message'=>'Data tidak berhasil diubah'],200);
            }
        }
    }
    
    public function getDelete($id) {
        $trunkType = TrunkType::find($id);
        $trunkType->delete();
        return Response::json(['message'=>'Data berhasil dihapus','kode'=>200],200);
    }
        
}
