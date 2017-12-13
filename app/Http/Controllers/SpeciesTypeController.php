<?php

namespace App\Http\Controllers;

use App\Models\DetailPohon\SpeciesType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class SpeciesTypeController extends Controller
{
    public function getIndex() {
        $speciesType = SpeciesType::orderBy('species_type_name')->paginate(10);
        return view('jenis_spesies.index',['datas'=>$speciesType]);
    }
    
//    public function getCreate() {
//        return view('test-controller.create');
//    }
    
    public function postCreate(Request $request) {
        $rule = array(
            'species_type_name'=>'required|unique:species_types'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json(['kode'=>404,'message'=>$validator->errors()],200);
        }
        $speciesType = new SpeciesType();
        $speciesType->species_type_name = $input['species_type_name'];
        $speciesType->created_by = 1;
        $speciesType->updated_by = 1;
        if($speciesType->save()){
            return Response::json(['kode'=>200,'message'=>'Data berhasil disimpan'],200);
        }
        return Response::json(['kode'=>404,'message'=>'Data tidak berhasil disimpan'],200);
    }
    
    public function getRetrieve() {
        $speciesType = SpeciesType::orderBy('species_type_name')->get();
        return Response::json(['species_type'=>$speciesType]);
    }
    
    public function postUpdate(Request $request) {
        $rule = array(
            'species_type_name'=>'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json(['kode'=>404,'message'=>$validator->errors()],200);
        }
        $speciesType = SpeciesType::find($input['id']);
        if(!$speciesType){
            return Response::json(['kode'=>404,'message'=>'Data tidak ditemukan'],200);
        }
        $speciesType->species_type_name = ($speciesType->species_type_name == $input['species_type_name']? $speciesType->species_type_name : $input['species_type_name']);
        $speciesType->updated_by = 1;
        $speciesType->update();
        return Response::json(['kode'=>200,'message'=>'Data berhasil diubah'],200);
    }
    
    public function getDelete($id) {
        $speciesType = SpeciesType::find($id);
        $speciesType->delete();
        return Response::json(['message'=>'Data berhasil dihapus','kode'=>200],200);
    }
}
