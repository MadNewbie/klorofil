<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NamaLokal;
use Illuminate\Support\Facades\Response;

class NamaLokalController extends Controller
{
    public function getIndex() {
        $nama_lokal = NamaLokal::orderBy('id_nama_ilmiah','asc')->paginate(7);
//        dd($nama_lokal->namaIlmiah->nama_ilmiah);
        return view('nama_lokal.index',['nama_lokals'=>$nama_lokal]);
    }
    
    public function postCreateNamaLokal(Request $request) {
         $this->validate($request,[
            'nama_lokal'=>'required|unique:nama_lokal',
        ]);
        $namaLokal = new NamaLokal();
        $namaLokal->nama_lokal = $request['nama_lokal'];
        $namaLokal->id_nama_ilmiah = $request['id_nama_ilmiah'];
        $namaLokal->created_by = 1;
        $namaLokal->updated_by = 1;
        if($namaLokal->save()){
           return Response::json(['message'=>'Nama lokal telah dibuat'],200) ;
        }
        return Response::json(['message'=>'Error selama proses penyimpanan',404]);  
    }
    
    public function postUpdateNamaLokal(Request $request){
        $this->validate($request,[
            'nama_lokal'=>'required',
            'id_nama_ilmiah'=>'required'
        ]);
        $namaLokal = NamaLokal::find($request['id_nama_lokal']);
        if(!$namaLokal){
            return Response::json(['message'=>'Nama lokal tidak ditemukan',404]);
        }
        $namaLokal->nama_lokal = ($request['nama_lokal']==$namaLokal->nama_lokal?$namaLokal->nama_lokal:$request['nama_lokal']);
        $namaLokal->id_nama_ilmiah = ($request['id_nama_ilmiah']==$namaLokal->id_nama_lokal?$namaLokal->id_nama_lokal:$request['id_nama_ilmiah']);
        $namaLokal->updated_by = 1;
        $namaLokal->update();
        return Response::json(['message'=>'Nama lokal berhasil diperbarui','new_nama_lokal'=>$request['nama_lokal'],'new_id_nama_ilmiah'=>$request['id_nama_ilmiah']],200);
    }
    
    public function getDeleteNamaLokal($id_nama_lokal) {
        $namaLokal = NamaLokal::find($id_nama_lokal);
        $namaLokal->delete();
        return Response::json(['message'=>'Nama lokal berhasil dihapus'],200);
    }
    
    public function getNamaLokal() {
        $namaLokal = NamaLokal::get();
        return Response::json(['nama_lokal'=>$namaLokal],200);
    }
}
