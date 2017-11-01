<?php

namespace App\Http\Controllers;

use App\Negara;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class NegaraController extends Controller
{
    public function getIndex(){
        $negara = Negara::orderBy('name')->paginate(10);
        return view('negara.index',['datas'=>$negara]);
    }
    
    public function getCreate(){
        return view('negara.create');
    }

    public function postCreate(Request $request){
//        dd($request['detail_area']);
        $rule = array(
            'name'=>'required|unique:negaras'
        );
        $input = $request->all();
        $validation = Validator::make($input,$rule);
//        dd($input,$validation,$validation->fails());
        if($validation->fails()){
//            dd(response()->json($validation->errors()));
            return Response::json($validation->errors(),200);
        }else{
            $negara = new Negara();
            $negara->name = $input['name'];
            $negara->created_by = 1;
            $negara->updated_by = 1;
    //        dd($negara->detail_area,$request['detail_area']);
            if($negara->setDetailAreaAttribute($input['detail_area'])){
                return Response::json(['kode'=>200,'message'=>'Data berhasil tersimpan'],200);
            }
            return Response::json(['kode'=>404,'message'=>'Data tidak berhasil tersimpan'],200);
        }
    }
    
    public function postUpdate(Request $request){
        $this->validate($request, [
            'name'=>'required'
        ]);
        $negara = Negara::find($request['id']);
        if(!$negara){
            return Response::json(['kode'=>404,'message'=>'Data tidak ditemukan'],404);
        }
    }
    
    public function getRetrieve() {
        $negara = Negara::all();
        return Response::json(['negara'=>$negara],200);
    }
}
