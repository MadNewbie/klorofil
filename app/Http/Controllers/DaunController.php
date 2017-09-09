<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daun;
use Illuminate\Support\Facades\Response;

class DaunController extends Controller
{
    public function getIndex() {
        $daun = Daun::orderBy('nama_jenis_daun','asc')->paginate(7);
        return view('daun.index',['dauns'=>$daun]);
    }
    
    public function postCreateDaun(Request $request) {
        $this->validate($request, [
            'nama_jenis_daun'=>'required|unique:daun'
        ]);
        $daun = new Daun();
        $daun->nama_jenis_daun = $request['nama_jenis_daun'];
        $daun->created_by = 1;
        $daun->updated_by = 1;
        if($daun->save()){
            return Response::json(['message'=>'Jenis daun telah dibuat'],200);
        }
        return Response::json(['message'=>'Error selama proses penyimpanan'],404);
    }
    
    public function postUpdateDaun(Request $request) {
        $this->validate($request, [
            'nama_jenis_daun'=>'required'
        ]);
        $daun = Daun::find($request['id_daun']);
        if(!$daun){
            return Response::json(['message'=>'Jenis daun tidak ditemukan',404]);
        }
        $daun->nama_jenis_daun = ($request['nama_jenis_daun']==$daun->nama_jenis_daun?$daun->nama_jenis_daun:$request['nama_jenis_daun']);
        $daun->updated_by = 1;
        $daun->update();
        return Response::json(['message'=>'Jenis daun berhasil diperbarui',200]);
    }
}
