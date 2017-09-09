<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NamaIlmiah;
use Illuminate\Support\Facades\Response;

class NamaIlmiahController extends Controller
{
    public function getIndex() {
        $nama_ilmiah = NamaIlmiah::orderBy('nama_ilmiah','asc')->paginate(7);
//        dd($nama_ilmiah->lastPage());
        return view('nama_ilmiah.index',['nama_ilmiahs'=>$nama_ilmiah]);
    }
    
    public function postCreateNamaIlmiah(Request $request){
        $this->validate($request,[
            'nama_ilmiah'=>'required|unique:nama_ilmiah',
        ]);
        $namaIlmiah = new NamaIlmiah();
        $namaIlmiah->nama_ilmiah = $request['nama_ilmiah'];
        $namaIlmiah->masa_jenis = ($request['masa_jenis'] != null ? $request['masa_jenis'] : 0 );
        $namaIlmiah->created_by = 1;
        $namaIlmiah->updated_by = 1;
        if($namaIlmiah->save()){
           return Response::json(['message'=>'Nama ilmiah telah dibuat'],200) ;
        }
        return Response::json(['message'=>'Error selama penyimpanan',404]);        
    }
    
    function postUpdateNamaIlmiah(Request $request){
        $this->validate($request,[
            'nama_ilmiah'=>'required',
        ]);
        $namaIlmiah = NamaIlmiah::find($request['id_nama_ilmiah']);
        if(!$namaIlmiah){
            return Response::json(['message'=>'Nama ilmiah tidak ditemukan',404]);
        }
        $namaIlmiah->nama_ilmiah=($request['nama_ilmiah'] == $namaIlmiah->nama_ilmiah ? $namaIlmiah->nama_ilmiah : $request['nama_ilmiah']);
        $namaIlmiah->masa_jenis=($request['masa_jenis'] != null ? $request['masa_jenis'] : $namaIlmiah->masa_jenis );
        $namaIlmiah->updated_by=1;
        $namaIlmiah->update();
        return Response::json(['message'=>'Nama ilmiah telah diperbarui','new_name' => $request['nama_ilmiah']],200);
    }
            
    function getDeleteNamaIlmiah($id_nama_ilmiah) {
        $nama_ilmiah = NamaIlmiah::find($id_nama_ilmiah);
        $nama_ilmiah->delete();
        return Response::json(['message'=>'Nama ilmiah berhasil dihapus'],200);
    }
    
    function getNamaIlmiah(){
        $nama_ilmiah = NamaIlmiah::get();
        return Response::json(['nama_ilmiah'=>$nama_ilmiah],200);
    }
}
