<?php

namespace App\Http\Controllers;

use App\Species;
use App\HabitaSpecies;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class SpeciesController extends Controller
{
    public function getIndex() {
        $species = Species::orderBy('species_type_id')->paginate(10);
        return view('test-controller.index',['datas'=>$species]);
    }
    
    public function getCreate() {
        return view('test-controller.create-species');
    }
    
    public function postCreate(Request $request) {
        $rule = array(
            'species_id' => 'required|unique:species',
            'scientific_name' => 'required|unique:species',
            'density' => 'required',
            'max_age' => 'required',
            'species_type_id' => 'required',
            'leaf_type_id' => 'required',
            'branch_type_id' => 'required',
            'trunk_type_id' => 'required',
            'root_type_id' => 'required',
            'function_type_id' => 'required',
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json($validator->errors(),200);
        }
        $species = new Species();
        $species->species_id = $input['species_id'];
        $species->scientific_name = $input['scientific_name'];
        $species->density = $input['density'];
        $species->max_age = $input['max_age'];
        $species->species_type_id = $input['species_type_id'];
        $species->leaf_type_id = $input['leaf_type_id'];
        $species->branch_type_id = $input['branch_type_id'];
        $species->trunk_type_id = $input['trunk_type_id'];
        $species->root_type_id = $input['root_type_id'];
        $species->function_type_species_id = $input['function_type_id'];
        $species->flower_color = $input['flower_color'];
        $species->flower_crown_shape = $input['flower_crown_shape'];
        $species->flower_crown_number = $input['flower_crown_number'];
        $species->flower_bloom_periode = $input['flower_bloom_periode'];
        $species->created_by = 1;
        $species->updated_by = 1;
        if($species->save()){
            return Response::json(['kode'=>200,'message'=>'Data Berhasil Tersimpan'],200);
        }
        return Response::json(['kode'=>404,'message'=>'Data TIdak Berhasil Tersimpan'],200);
    }
    
    public function getRetrieve() {
        $species = Species::orderBy('scientific_name')->get();
        return Response::json(['species'=>$species]);
    }
}
