<?php

namespace App\Http\Controllers;

use App\Treatment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class TreatmentController extends Controller
{
    public function getIndex() {
        $treatment = Treatment::orderBy('species_type_id')->paginate(10);
        return view('test-controller.index',['datas'=>$treatment]);
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
            return Response::json($validator->errors(),200);
        }
        $treatment = new Treatment;
        $treatment->name = $input['name'];
        $treatment->type_species_id = $input['species_type_id'];
        $treatment->created_by = 1;
        $treatment->updated_by = 1;
        if($treatment->save()){
            return Response::json(['kode'=>200,'message'=>'Data Berhasil Tersimpan'],200);
        }
        return Response::json(['kode'=>404,'message'=>'Data Tidak Berhasil Tersimpan'],200);
    }
}
