<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisPenyakit;
use Illuminate\Support\Facades\Response;

class JenisPenyakitController extends Controller
{
    public function getIndex() {
        $jenisPenyakit = JenisPenyakit::orderBy('nama_jenis_penyakit','asc')->paginate(7);
        return view('jenis_penyakit/index',['jenis_penyakits'=>$jenisPenyakit]);
    }
    
    public function postCreateJenisPenyakit(Request $request) {
        $this->validate($request, [
            'nama_jenis_penyakit'=>'required|unique:jenis_penyakit'
        ]);
        $jenisPenyakit = new JenisPenyakit();
        $jenisPenyakit->nama_jenis_penyakit = $request['nama_jenis_penyakit'];
        $jenisPenyakit->created_by = 1;
        $jenisPenyakit->updated_by = 1;
        if($jenisPenyakit->save()){
            return Response::json(['message'=>'Jenis penyakit telah ditambahkan','kode'=>200],200);
        }
        return Response::json(['message'=>'Error terjadi ketika menambahkan data','kode'=>404],404);
    }
    
    public function postUpdateJenisPenyakit(Request $request) {
        $this->validate($request, [
            'nama_jenis_penyakit'=>'required'
        ]);
        $jenisPenyakit = JenisPenyakit::find($request['id_jenis_penyakit']);
        if(!$jenisPenyakit){
            return Response::json(['message'=>'Data jenis penyakit tidak ditemukan','kode'=>404],404);
        }
        $jenisPenyakit->nama_jenis_penyakit = ($jenisPenyakit->nama_jenis_penyakit==$request['nama_jenis_penyakit']?$jenisPenyakit->nama_jenis_penyakit:$request['nama_jenis_penyakit']);
        $jenisPenyakit->updated_by = 1;
        $jenisPenyakit->update();
        return Response::json(['message'=>'Data jenis penyakit berhasil diubah','kode'=>200],200);
    }   
    
    public function getDeleteJenisPenyakit($id_jenis_penyakit) {
        $jenisPenyakit = JenisPenyakit::find($id_jenis_penyakit);
        $jenisPenyakit->delete();
        return Response::json(['message'=>'Data jenis penyakit berhasil dihapus','kode'=>200],200);
    }
    
    public function getJenisPenyakit() {
        $jenisPenyakit = JenisPenyakit::orderBy('nama_jenis_penyakit')->get();
        return Response::json(['jenis_penyakit'=>$jenisPenyakit]);
    }
}
