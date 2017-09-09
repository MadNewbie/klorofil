<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habitat;
use Illuminate\Support\Facades\Response;

class HabitatController extends Controller
{
    public function getIndex() {
        $habitat = Habitat::orderBy('nama_hewan','asc')->paginate(7);
        return view('habitat.index',['habitats'=>$habitat]);
    }
    
    public function postCreateHabitat(Request $request){
        $this->validate($request, [
            'nama_hewan'=>'required|unique:habitat',
            'keterangan'=>'required'
        ]);
        $habitat = new Habitat();
        $habitat->nama_hewan = $request['nama_hewan'];
        $habitat->keterangan = $request['keterangan'];
        $habitat->created_by = 1;
        $habitat->updated_by = 1;
        if($habitat->save()){
            return Response::json(['message'=>'Habitat berhasil dibuat','kode'=>200],200);
        }
        return Response::json(['message'=>'Error pada proses pembuatan','kode'=>404],404);
    }
    
    public function postUpdateHabitat(Request $request) {
        $this->validate($request, [
            'nama_hewan'=>'required',
            'keterangan'=>'required'
        ]);
        $habitat = Habitat::find($request['id_habitat']);
        if(!$habitat){
            return Response::json(['message'=>'Data habitat tidak ditemukan','kode'=>404],404);
        }
        $habitat->nama_hewan = ($habitat->nama_hewan == $request['nama_hewan']?$habitat->nama_hewan:$request['nama_hewan']);
        $habitat->keterangan = $request['keterangan'];
        $habitat->updated_by = 1;
        $habitat->update();
        return Response::json(['message'=>'Data habitat berhasil diperbarui','kode'=>200],200);
    }
    
    public function getDeleteHabitat($id_habitat) {
        $habitat = Habitat::find($id_habitat);
        $habitat->delete();
        return Response::json(['message'=>'Data habitat berhasil dihapus','kode'=>200],200);
    }
}
