<?php

namespace App\Http\Controllers;

use App\Disease;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class DiseaseController extends Controller
{
    public function getIndex() {
        $disease = Disease::orderBy('name')->paginate(10);
        return view('test-controller.index',['datas'=>$disease]);
    }
    
    public function getCreate() {
        return view('test-controller.create');
    }
    
    public function postCreate(Request $request) {
        $rule = array(
            'name'=>'required',
            'weight'=>'required',
            'disease_type_id'=>'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json(['error'=>404,'message'=>$validator->errors()],200);
        }
        $disease = new Disease();
        $disease->name = $input['name'];
        $disease->weight = $input['weight'];
        $disease->disease_type_id = $input['disease_type_id'];
        $disease->created_by = 1;
        $disease->updated_by = 1;
        if($disease->save()){
            return Response::json(['kode'=>200,'message'=>'Data Berhasil Tersimpan']);
        }
        return Response::json(['kode'=>404,'message'=>'Data Tidak Berhasil Tersimpan']);
    }
    
    public function getRetrieve($id=null) {
        if($id==null){
            $disease = Disease::orderBy('name')->get();
        }else{
            $disease = Disease::where('id',$id)->get();
        }
        return Response::json(['kode'=>200,'disease'=>$disease],200);
    }
    
    public function postUpdated(Request $request) {
        $rule = array(
            'name'=>'required',
            'weigth'=>'required',
            'disease_type_id'=>'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json(['kode'=>404,'message'=>$validator->errors()],200);
        }
        $disease = Disease::find($input['id']);
        if(!$disease){
            return Response::json(['kode'=>404,'message'=>'Data Tidak Ditemukan'],200);
        }
        $disease->name = (strcmp($disease->name,$input['name'])==0?$disease->name:$input['name']);
        $disease->weight = $input['weight'];
        $disease->disease_type_id = $input['disease_type_id'];
        $disease->updated_by = 1;
        if($disease->update()){
            return Response::json(['kode'=>200,'message'=>'Data Berhasil Terupdate'],200);
        }else{
            return Response::json(['kode'=>404,'message'=>'Data Tidak Berhasil Terupdate'],200);
        }
    }
    
    public function getDelete($id) {
        $disease = Disease::find($id);
        if($disease->delete()){
            return Response::json(['kode'=>200,'message'=>'Data Berhasil Tehapus'],200);
        }else{
            return Response::json(['kode'=>404,'message'=>'Data Tidak Berhasil Terhapus'],200)
        }
    }
}
