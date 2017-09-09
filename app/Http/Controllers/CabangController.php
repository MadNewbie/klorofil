<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cabang;
use Illuminate\Support\Facades\Response;

class CabangController extends Controller
{
    public function getIndex() {
        $cabang = Cabang::orderBy('nama_jenis_cabang','asc')->paginate(7);
        return view('cabang.index',['cabangs'=>$cabang]);
    }
    
    public function postCreateCabang(Request $request) {
        $this->validate($request, [
            'nama_jenis_cabang'=>'required|unique:cabang'
        ]);
        $cabang = new Cabang();
        $cabang->nama_jenis_cabang = $request['nama_jenis_cabang'];
        $cabang->created_by = 1;
        $cabang->updated_by = 1;
        if($cabang->save()){
            return Response(['message'=>'Jenis cabang telah dibuat'],200);
        }
        return Response(['message'=>'Error selama proses penyimpanan'],404);
    }
    
    public function postUpdateCabang(Request $request) {
        $this->validate($request, [
            'nama_jenis_cabang'=>'required'
        ]);
        $cabang = Cabang::find($request['id_cabang']);
        if(!$cabang){
            return Response::json(['message'=>'Jenis cabang tidak ditemukan']);
        }
        $cabang->nama_jenis_cabang = ($cabang->nama_jenis_cabang == $request['nama_jenis_cabang']?$cabang->nama_jenis_cabang:$request['nama_jenis_cabang']);
        $cabang->updated_by = 1;
        $cabang->update();
        return Response::json(['message'=>'Jenis cabang berhasil diperbarui'],200);
    }
    
    public function getDeleteCabang($id_cabang) {
        $cabang = Cabang::find($id_cabang);
        $cabang->delete();
        return Response::json(['message'=>'Jenis cabang berhasil dihapus'],404);
    }
}
