<?php

namespace App\Http\Controllers;

use App\Habitat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class HabitatController extends Controller
{
    public function getIndex() {
        $habitat = Habitat::orderBy('animal_name')->paginate(10);
        return view('habitat.index',['datas'=>$habitat]);
    }
    
    public function getCreate() {
        return view('test-controller.create');
    }
    
    public function postCreate(Request $request) {
        $rule = array(
            'animal_name'=>'required|unique:habitats',
            'description'=>'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json($validator->errors(),200);
        }
        $habitats = new Habitat();
        $habitats->animal_name = $input['animal_name'];
        $habitats->description = $input['description'];
        $habitats->created_by = 1;
        $habitats->updated_by = 1;
        if($habitats->save()){
            return Response::json(['kode'=>200,'message'=>'Data berhasil disimpan']);
        }
        return Response::json(['kode'=>404,'message'=>'Data tidak berhasil disimpan']);
    }
    
    function getRetrieve(){
        $habitat = Habitat::orderBy('animal_name')->get();
        return Response::json(['habitat'=>$habitat]);
    }
}
