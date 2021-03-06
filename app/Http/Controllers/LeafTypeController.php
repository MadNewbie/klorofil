<?php

namespace App\Http\Controllers;

use App\LeafType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class LeafTypeController extends Controller
{
    public function getIndex() {
        $leafType = LeafType::orderBy('leaf_type_name')->paginate(10);
        return view('daun.index',['datas'=>$leafType]);
    }
    
    public function getCreate() {
        return view('test-controller.create');
    }
    
    public function postCreate(Request $request) {
        $rule = array(
            'leaf_type_name'=>'required|unique:leaf_types'
        );
        $input = $request->all();
        $validation = Validator::make($input,$rule);
        if($validation->fails()){
            return Response::json($validation->errors(),200);
        }
        $leafType = new LeafType();
        $leafType->leaf_type_name = $input['leaf_type_name'];
        $leafType->created_by = 1;
        $leafType->updated_by = 1;
        if($leafType->save()){
            return Response::json(['kode'=>200,'message'=>'Data telah tersimpan'],200);
        }
        return Response::json(['kode'=>200,'message'=>'Data tidak tersimpan'],200);
    }
    
    public function getRetrieve() {
        $leafType = LeafType::orderBy('leaf_type_name')->get();
        return Response::json(['leaf_type'=>$leafType]);
    }
}
