<?php

namespace App\Http\Controllers;

use App\CommonName;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class CommonNameController extends Controller
{
    public function getIndex() {
        $commonName = CommonName::orderBy('species_id')->get();
        return view('test-controller.index',['datas'=>$commonName]);
    }
    
    public function getCreate() {
        return view('test-controller.create');
    }
    
    public function postCreate(Request $request) {
        $rule = array(
            'common_name'=>'required',
            'species_id'=>'required'
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return Response::json($validator->errors());
        }
        $commonName = new CommonName();
        $commonName->common_name = $input['common_name'];
        $commonName->species_id = $input['species_id'];
        $commonName->created_by = 1;
        $commonName->updated_by = 1;
        if($commonName->save()){
            return Response::json(['kode'=>200,'message'=>'Data berhasil tersimpan']);
        }
        return Response::json(['kode'=>404,'message'=>'Data tidak berhasil tersimpan']);
    }
    
    public function getRetrieve() {
        $commonName = CommonName::orderBy('species_id')->get();
        return Response::json(['common_name'=> $commonName]);
    }
}
