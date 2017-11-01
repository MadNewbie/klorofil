<?php

namespace App\Http\Controllers;

use App\PlantTreatment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class PlantTreatmentController extends Controller
{
    public function getIndex() {
        $plant_treatment = PlantTreatment::orderBy('treatment_date')->get();
        return view('test-controller.index',['datas'=>$plant_treatment]);
    }
    
    public function getCreate() {
        return view('test-controller.create');
    }
    
    public function postCreate(Request $request) {
        $rule = array(
            'treatment_date'=>'required',
            'treatment_id'=>'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$request);
        if($validator->fails()){
            return Response::json($validator->errors(),200);
        }
        $plantTreatment = new PlantTreatment();
        $plantTreatment->treatment_date = $input['treatment_date'];
        $plantTreatment->treatment_id = $input['treatment_id'];
        $plantTreatment->created_by = 1;
        $plantTreatment->updated_by = 1;
        if($plantTreatment->save()){
            return Response::json(['message'=>'Data Berhasil Tersimpan','Kode'=>200],200);
        }
        return Response::json(['message'=>'Data Tidak Berhasil Tersimpan','Kode'=>404],200);
    }
    
    public function getRetrieve() {
        $plantTreatment = PlantTreatment::orderBy('treatment_id')->get();
        return Response::json(['plant_treatment'=>$plantTreatment]);
    }
}
