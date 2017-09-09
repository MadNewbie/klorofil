<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisPerlakuan;
use Illuminate\Support\Facades\Response;

class JenisPerlakuanController extends Controller
{
    public function getIndex() {
        $jenisPerlakuan = JenisPerlakuan::orderBy('nama_jenis_perlakuan','asc')->paginate(7);
        return view('jenis_perlakuan.index',['jenis_perlakuans'=>$jenisPerlakuan]);
    }
    
    public function postCreateJenisPerlakuan(Request $request) {
        $this->validate($request, [
            'nama_jenis_perlakuan'=>'required|unique:jenis_perlakuan'
        ]);
        $jenisPerlakuan = new JenisPerlakuan();
        $jenisPerlakuan->nama_jenis_perlakuan = $request['nama_jenis_perlakuan'];
        $jenisPerlakuan->created_by = 1;
        $jenisPerlakuan->updated_by = 1;
        if($jenisPerlakuan->save()){
            return Response::json(['message'=>'Data jenis perlakuan ditambahkan','kode'=>200],200);
        }
        return Response::json(['message'=>'Error saat menambahkan data','kode'=>404],404);
    }
    
    public function postUpdateJenisPerlakuan(Request $request) {
        $this->validate($request, [
            'nama_jenis_perlakuan'=>'required'
        ]);
        $jenisPerlakuan = JenisPerlakuan::find($request['id_jenis_perlakuan']);
        if(!$jenisPerlakuan){
            return Response::json(['message'=>'Data jenis perlakuan tidak ditemukan','kode'=>404],404);
        }
        $jenisPerlakuan->nama_jenis_perlakuan = ($jenisPerlakuan->nama_jenis_perlakuan==$request['nama_jenis_perlakuan']?$jenisPerlakuan->nama_jenis_perlakuan:$request['nama_jenis_perlakuan']);
        $jenisPerlakuan->updated_by=1;
        $jenisPerlakuan->update();
        return Response::json(['message'=>'Data jenis perlakuan diperbarui','kode'=>200],200);
    }
    
    public function getDeleteJenisPerlakuan($id_jenis_perlakuan) {
        $jenisPerlakuan = JenisPerlakuan::find($id_jenis_perlakuan);
        $jenisPerlakuan->delete();
        return Response::json(['message'=>'Data jenis perlakuan telah dihapus','kode'=>200],200);
    }
    
    public function getJenisPerlakuan() {
        $jenis_perlakuan = JenisPerlakuan::orderBy('nama_jenis_perlakuan')->get();
        return Response::json(['jenis_perlakuan'=>$jenis_perlakuan]);
    }
}
