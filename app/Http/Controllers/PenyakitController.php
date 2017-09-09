<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
use Illuminate\Support\Facades\Response;

class PenyakitController extends Controller
{
    public function getIndex() {
        $penyakit = Penyakit::orderBy('id_jenis_penyakit')->paginate(7);
        return view('penyakit.index',['penyakits'=>$penyakit]);
    }
    
    public function postCreatePenyakit(Request $request) {
        $this->validate($request, [
            'nama_penyakit'=>'required|unique:penyakit',
            'id_jenis_penyakit'=>'required',
            'bobot'=>'required'
        ]);
        $penyakit = new Penyakit();
        $penyakit->nama_penyakit = $request['nama_penyakit'];
        $penyakit->id_jenis_penyakit = $request['id_jenis_penyakit'];
        $penyakit->bobot = $request['bobot'];
        $penyakit->created_by = 1;
        $penyakit->updated_by = 1;
        if($penyakit->save()){
            return Response::json(['kode'=>200,'message'=>'Data penyakit berhasil disimpan'],200);
        }
        return Response::json(['kode'=>404,'message'=>'Error terjadi pada proses penyimpanan'],404);
    }
    
    public function postUpdatePenyakit(Request $request) {
        $this->validate($request, [
            'nama_penyakit'=>'required',
            'id_jenis_penyakit'=>'required',
            'bobot'=>'required'
        ]);
        $penyakit = Penyakit::find($request['id_penyakit']);
        if(!$penyakit){
            return Response::json(['kode'=>404,'message'=>'Data penyakit tidak ditemukan'],404);
        }
        $penyakit->nama_penyakit = ($request['nama_penyakit']==$penyakit->nama_penyakit?$penyakit->nama_penyakit:$request['nama_penyakit']);
        $penyakit->id_jenis_penyakit = ($request['id_jenis_penyakit']==$penyakit->id_jenis_penyakit?$penyakit->id_jenis_penyakit:$request['id_jenis_penyakit']);
        $penyakit->bobot = ($request['bobot']==$penyakit->bobot?$penyakit->bobot:$request['bobot']);
        $penyakit->updated_by = 1;
        $penyakit->update();
        return Response::json(['kode'=>200,'message'=>'Data penyakit berhasil diperbarui'],200);
    }
    
    public function getDeletePenyakit($id_penyakit) {
        $penyakit = Penyakit::find($id_penyakit);
        $penyakit->delete();
        return Response::json(['kode'=>200,'message'=>'Data penyakit berhasil dihapus'],200);
    }
    
    public function getPenyakit() {
        $penyakit = Penyakit::orderBy('id_jenis_penyakit')->get();
        return Response::json(['penyakit'=>$penyakit]);
    }
}
