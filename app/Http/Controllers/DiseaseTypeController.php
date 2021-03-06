<?php

namespace App\Http\Controllers;

use App\DiseaseType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class DiseaseTypeController extends Controller
{
    public function getIndex() {
        $diseaseType = DiseaseType::orderBy('name')->paginate(10);
        return view('test-controller.index',['datas'=>$diseaseType]);
    }
    
    public function getCreate() {
        return view('test-controller.create');
    }
    
    public function postCreate(Request $request) {
        $rule = array(
            'name'=>'required|unique:disease_types',
            'species_type_id'=>'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json($validator->errors(),200);
        }
        $diseaseType = new DiseaseType();
        $diseaseType->name = $input['name'];
        $diseaseType->created_by = 1;
        $diseaseType->updated_by = 1;
        $diseaseType->species_type_id = $input['species_type_id'];
        if($diseaseType->save()){
            return Response::json(['kode'=>200,'message'=>'Data Berhasil Tersimpan'],200);
        }
        return Response::json(['kode'=>404,'message'=>'Data Tidak Berhasil Tersimpan'],200);
    }
    
    public function getRetrieve($species_type_id = null) {
        if($species_type_id == null){
            $diseaseType = DiseaseType::orderBy('name')->get();
        }else{
            $diseaseType = DiseaseType::where('species_type_id',$species_type_id)->get();
        }
        return Response::json(['disease_type'=>$diseaseType],200);
    }
}
