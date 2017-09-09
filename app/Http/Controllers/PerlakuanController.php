<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perlakuan;
use Illuminate\Support\Facades\Response;

class PerlakuanController extends Controller
{
    public function getIndex() {
        $perlakuan = Perlakuan::orderBy('id_jenis_perlakuan')->paginate(7);
        return view('perlakuan.index',['perlakuans'=>$perlakuan]);
    }
    
    public function postCreatePerlakuan(Request $request) {
        $this->validate($request, [
            'nama_perlakuan'=>'required|unique:perlakuan',
            'id_jenis_perlakuan'=>'required'
        ]);
        $perlakuan = new Perlakuan();
        $perlakuan->nama_perlakuan = $request['nama_perlakuan'];
        $perlakuan->id_jenis_perlakuan = $request['id_jenis_perlakuan'];
        $perlakuan->created_by = 1;
        $perlakuan->updated_by = 1;
        if($perlakuan->save()){
            return Response::json(['kode'=>200,'message'=>'Data perlakuan berhasil ditambahkan'],200);
        }
        return Response::json(['kode'=>404,'message'=>'Error terjadi saat melakukan penyimpanan data'],404);
    }
    
    public function postUpdatePerlakuan(Request $request) {
        $this->validate($request, [
            'nama_perlakuan'=>'required',
            'id_jenis_perlakuan'=>'required'
        ]);
        $perlakuan = Perlakuan::find($request['id_perlakuan']);
        if(!$perlakuan){
            return Response::json(['kode'=>404,'message'=>'Data perlakuan tidak ditemukan'],404);
        }
        $perlakuan->nama_perlakuan = ($request['nama_perlakuan']==$perlakuan->nama_perlakuan?$perlakuan->nama_perlakuan:$request['nama_perlakuan']);
        $perlakuan->id_jenis_perlakuan = ($request['id_jenis_perlakuan']==$perlakuan->id_jenis_perlakuan?$perlakuan->id_jenis_perlakuan:$request['id_jenis_perlakuan']);
        $perlakuan->updated_by = 1;
        $perlakuan->update();
        return Response::json(['kode'=>200,'message'=>'Data perlakan telah diperbarui'],200);
    }
    
    public function getDeletePerlakuan($id_perlakuan) {
        $perlakuan = Perlakuan::find($id_perlakuan);
        $perlakuan->delete();
        return Response::json(['kode'=>200,'message'=>'Data perlakuan telah dihapus'],200);
    }
    
    public function getPerlakuan() {
        $perlakuan = Perlakuan::orderBy('nama_perlakuan')->get();
        return Response::json(['perlakuan'=>$perlakuan]);
    }
}
