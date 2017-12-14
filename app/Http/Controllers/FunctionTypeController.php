<?php

namespace App\Http\Controllers;

use App\Models\DetailPohon\FunctionTypeSpecies;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class FunctionTypeController extends Controller
{
    public function getIndex() {
        $functionTypeSpecies = FunctionTypeSpecies::orderBy('species_type_id')->paginate(10);
        return view('fungsi_spesies.index',['datas'=>$functionTypeSpecies]);
    }

    public function getCreate() {
        return view('test-controller.create');
    }

    public function postCreate(Request $request) {
        $rule = array(
            'function_type_species'=>'required',
            'species_type_id'=>'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json(['kode'=>404,'message'=>$validator->errors()],200);
        }
        $functionType = new FunctionTypeSpecies();
        $functionType->function_type_species = $input['function_type_species'];
        $functionType->created_by = 1;
        $functionType->updated_by = 1;
        $functionType->species_type_id = $input['species_type_id'];
        if($functionType->save()){
            return Response::json(['kode'=>200,'message'=>'Data Berhasil Disimpan'],200);
        }
        return Response::json(['kode'=>404,'message'=>'Data Tidak Berhasil Disimpan'],200);
    }

    public function getRetrieve($species_type_id = null) {
        if($species_type_id == null){
            $functionType = FunctionTypeSpecies::orderBy('function_type_species')->get();
        }else{
            $functionType = FunctionTypeSpecies::where('species_type_id',$species_type_id)->get();
        }
        return Response::json(['function_type'=>$functionType],200);
    }

    public function postUpdate(Request $request){
        $rule = array(
            'function_type_species'=>'required',
            'species_type_id'=>'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json(['kode'=>404,'message'=>$validator->errors()],200);
        }
        $functionType = FunctionTypeSpecies::find($input['id']);
        if(!$functionType){
            return Response::json(['kode'=>404,'message'=>'Data tidak ditemukan'],200);
        }
        $functionType->function_type_species= ($functionType->function_type_species == $input['function_type_species']?$functionType->function_type_species:$input['function_type_species']);
        $functionType->species_type_id = $input['species_type_id'];
        $functionType->updated_by = 1;
        $functionType->update();
        return Response::json(['kode'=>200,'message'=>'Data berhasil diubah'],200);
    }

    public function getDelete($id) {
        $functionType = FunctionTypeSpecies::find($id);
        $functionType->delete();
        return Response::json(['message'=>'Data berhasil dihapus','kode'=>200],200);
    }
}
