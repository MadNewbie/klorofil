<?php

namespace App\Http\Controllers;

use App\Treatment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class TreatmentController extends Controller
{
    public function getIndex() {
        $treatment = Treatment::orderBy('name')->paginate(10);
        return view('perlakuan.index',['datas'=>$treatment]);
    }
    
    public function getCreate() {
        return view('test-controller.create');
    }
    
    public function postCreate(Request $request) {
        $rule = array(
            'name' => 'required',
            'species_type_id' => 'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json(['kode'=>404,'message'=>$validator->errors()],200);
        }
        $treatment = new Treatment;
        $treatment->name = $input['name'];
        $treatment->species_type_id = $input['species_type_id'];
        $treatment->created_by = 1;
        $treatment->updated_by = 1;
        if($treatment->save()){
            return Response::json(['kode'=>200,'message'=>'Data Berhasil Tersimpan'],200);
        }
        return Response::json(['kode'=>404,'message'=>'Data Tidak Berhasil Tersimpan'],200);
    }
    
    public function getRetrieve($id = null) {
        if($id==null){
            $treatment = Treatment::orderBy('species_type_id')->get();
        }else{
            $treatment = Treatment::where('id',$id)->get();
        }
        return Response::json(['treatment'=>$treatment],200);
    }
    
    public function postUpdate(Request $request) {
        $rule = array(
          'name'=>'required',
          'species_type_id'=>'required'
        );
       $input = $request->all();
       $validator = Validator::make($input,$rule);
       if($validator->fails()){
           return Response::json(['kode'=>404,'message'=>$validator->errors()],200);
       }
       $treatment = Treatment::find($input['id']);
       $treatment->name = $input['name'];
       $treatment->species_type_id = $input['species_type_id'];
       $treatment->updated_by = 1;
       if($treatment->update()){
           return Response::json(['kode'=>200,'message'=>'Data Berhasil Terupdate'],200);
       }else{
           return Response::json(['kode'=>404,'message'=>'Data Tidak Berhasil Terupdate'],200);
       }
    }
    
    public function getDelete($id) {
        $treatment = Treatment::find($id);
        if($treatment->delete()){
            return Response::json(['kode'=>200,'message'=>'Data Berhasil Terhapus'],200);
        }else{
            return Response::json(['kode'=>404,'message'=>'Data Tidak Berhasil Terhapus'],200);
        }
    }
}
