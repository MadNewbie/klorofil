<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertumbuhan;
use Illuminate\Support\Facades\Response;

class PertumbuhanController extends Controller
{
    public function getIndex() {
        $jenisPertumbuhan = Pertumbuhan::orderBy('nama_jenis_pertumbuhan','asc')->paginate(7);
        return view('pertumbuhan.index',['jenis_pertumbuhans'=>$jenisPertumbuhan]);
    }
    
    public function postCreatePertumbuhan(Request $request) {
        $this->validate($request, [
            'nama_jenis_pertumbuhan'=>'required|unique:pertumbuhan'
        ]);
        $pertumbuhan = new Pertumbuhan();
        $pertumbuhan->nama_jenis_pertumbuhan = $request['nama_jenis_pertumbuhan'];
        $pertumbuhan->created_by = 1;
        $pertumbuhan->updated_by = 1;
        if($pertumbuhan->save()){
            return Response::json(['message'=>'Jenis pertumbuhan berhasil ditambahkan'],200);
        }
        return Response::json(['message'=>'Error selama penyimpanan',404]);
    }
    
    public function postUpdatePertumbuhan(Request $request) {
        $this->validate($request, [
            'nama_jenis_pertumbuhan'=>'required'
        ]);
        $pertumbuhan = Pertumbuhan::find($request['id_pertumbuhan']);
        if(!$pertumbuhan){
            return Response::json(['message'=>'Nama jenis pertumbuhan tidak ditemukan',404]);
        }
        $pertumbuhan->nama_jenis_pertumbuhan = ($request['nama_jenis_pertumbuhan']==$pertumbuhan->nama_jenis_pertumbuhan?$pertumbuhan->nama_jenis_pertumbuhan:$request['nama_jenis_pertumbuhan']);
        $pertumbuhan->updated_by=1;
        $pertumbuhan->update();
        return Response::json(['message'=>'Nama jenis pertumbuhan berhasil diperbarui','new_nama_jenis_pertumbuhan'=>$request['nama_jenis_pertumbuhan']],200);
    }
    
    public function getDeletePertumbuhan($id_pertumbuhan) {
        $pertumbuhan = Pertumbuhan::find($id_pertumbuhan);
        $pertumbuhan->delete();
        return Response::json(['message'=>'Jenis pertumbuhan berhasil dihapus'],200);
    }
}
