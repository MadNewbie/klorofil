<?php

namespace App\Http\Controllers;

use App\Models\DetailPohon\BranchType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class BranchTypeController extends Controller
{
    public function getIndex() {
        $branchType = BranchType::orderBy('branch_type_name')->paginate(10);
        return view('cabang.index',['datas'=>$branchType]);
    }
    
    public function getCreate() {
        return view('test-controller.create');
    }
    
    public function postCreate(Request $request) {
        $rule = array(
            'branch_type_name'=>'required|unique:branch_types'
        );
        $input = $request->all();
        $validation = Validator::make($input,$rule);
        if($validation->fails()){
            return Response::json($validation->errors(),200);
        }else{
            $branchType = new BranchType();
            $branchType->branch_type_name = $input['branch_type_name'];
            $branchType->created_by = 1;
            $branchType->updated_by = 1;
            if($branchType->save()){
                return Response::json(['kode'=>200,'message'=>'Data berhasil disimpan'],200);
            }else{
                return Response::json(['kode'=>404,'message'=>'Data tidak berhasil disimpan'],200);
            }
        }
    }
    
    public function getRetrieve() {
        $branchType = BranchType::orderBy('branch_type_name')->get();
        return Response::json(['branch_type'=>$branchType]);
    }
    
    public function postUpdate(Request $request) {
        $rule = array(
            'branch_type_name' => 'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return response::json(['kode'=>404,'message'=>$validator->errors()],200);
        }
        $branchType = branchType::find($input['id']);
        if(!$branchType){
            return Response::json(['kode'=>404,'message'=>'Data tidak ditemukan'],200);
        }
        $branchType->branch_type_name= ($branchType->branch_type_name == $input['branch_type_name']? $branchType->branch_type_name : $input['branch_type_name']);
        $branchType->updated_by = 1;
        $branchType->update();
        return Response::json(['kode'=>200,'message'=>'Data berhasil diubah'],200);
    }
    
    public function getDelete($id) {
        $branchType = BranchType::find($id);
        $branchType->delete();
        return Response::json(['message'=>'Data berhasil dihapus','kode'=>200],200);
    }
}
