<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bunga;
use Illuminate\Support\Facades\Response;

class BungaController extends Controller
{
    public function getIndex() {
        $bunga = Bunga::orderBy('nama_jenis_bunga','asc')->paginate(7);
        return view('bunga.index',['bungas'=>$bunga]);
    }
    
    public function postCreateBunga(Request $request) {
        $this->validate($request, [
            'nama_jenis_bunga'=>'required|unique:bunga'
        ]);
        $bunga = new Bunga();
        $bunga->nama_jenis_bunga = $request['nama_jenis_bunga'];
        $bunga->created_by = 1;
        $bunga->updated_by = 1;
        if($bunga->save()){
            return Response(['message'=>'Jenis bunga telah dibuat'],200);
        }
        return Response(['message'=>'Error selama proses penyimpanan'],404);
    }
    
    public function postUpdateBunga(Request $request) {
        $this->validate($request, [
            'nama_jenis_bunga'=>'required'
        ]);
        $bunga = Bunga::find($request['id_bunga']);
        if(!$bunga){
            return Response::json(['message'=>'Jenis bunga tidak ditemukan'],404);
        }
        $bunga->nama_jenis_bunga = ($bunga->nama_jenis_bunga == $request['nama_jenis_bunga']?$bunga->nama_jenis_bunga:$request['nama_jenis_bunga']);
        $bunga->updated_by = 1;
        $bunga->update();
        return Response::json(['message'=>'Jenis bunga berhasil diperbarui'],200);
    }
    
    public function getDeleteBunga($id_bunga) {
        $bunga = Bunga::find($id_bunga);
        $bunga->delete();
        return Response::json(['message'=>'Jenis bunga berhasil dihapus']);
    }
}
