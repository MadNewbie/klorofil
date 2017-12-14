<?php

namespace App\Http\Controllers;

use App\Models\Tanaman\PlantGeneral;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class PlantGeneralController extends Controller
{
    public function getIndex() {
        $plantGeneral = PlantGeneral::orderBy('id')->get();
        return view('test-controller.index',['datas'=>$plantGeneral]);
    }
    
    public function getCreate() {
        return view('test-controller.create');
    }
    
    public function postCreate(Request $request) {
        $role = array(
            'status'=>'required',
            'age'=>'required',
            'area_id'=>'required',
            'species_id'=>'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$role);
        if($validator->fails()){
            return Response::json($validator->errors(),200);
        }
        $plantGeneral = new PlantGeneral();
        $plantGeneral->status = $input['status'];
        $plantGeneral->age = $input['age'];
        $plantGeneral->area_id = $input['area_id'];
        $plantGeneral->species_id = $input['species_id'];
    }
}
