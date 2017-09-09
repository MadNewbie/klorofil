<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\JenisWilayahUser;

class JenisWilayahUserController extends Controller
{
    function getIndex() {
        $jenis_wilayah_user = JenisWilayahUser::OrderBy('nilai','asc')->paginate(7);
        return view('jenis_wilayah_user.index',['jenis_wilayah_users'=>$jenis_wilayah_user]);
    }
    
    function postCreateJenisWilayahUser(Request $request){
        $this->validate($request, [
            'nama_jenis_wilayah_user'=>'required|unique:jenis_wilayah_user',
            'nilai'=>'required'
            ]);
        $jenis_wilayah_user = new JenisWilayahUser();
        $jenis_wilayah_user->nama_jenis_wilayah_user = $request['nama_jenis_wilayah_user'];
        $jenis_wilayah_user->nilai = $request['nilai'];
        if($jenis_wilayah_user->save()){
            return Response::json(['message'=>'Data jenis wilayah user berhasil ditambahkan','kode'=>200],200);
        }
        return Response::json(['message'=>'Error dalam proses penyimpanan data','kode'=>404],404);
    }
    
    function postUpdateJenisWilayahUser(Request $request) {
        $this->validate($request, [
            'nama_jenis_wilayah_user'=>'required',
            'nilai'=>'required'
        ]);
        $jenis_wilayah_user = JenisWilayahUser::find($request['id_jenis_wilayah_user']);
        if(!$jenis_wilayah_user){
            return Response::json(['kode'=>404,'message'=>'Data jenis wilayah user tidak ditemukan'],404);
        }
        $jenis_wilayah_user->nama_jenis_wilayah_user = $request['nama_jenis_wilayah_user'];
        $jenis_wilayah_user->nilai = $request['nilai'];
        $jenis_wilayah_user->update();
        return Response::json(['kode'=>200,'message'=>'Data jenis wilayah user berhasil diubah'],200);
    }
    
    function getDeleteJenisWilayahUser($id_jenis_wilayah_user) {
        $jenis_wilayah_user = JenisWilayahUser::find($id_jenis_wilayah_user);
        $jenis_wilayah_user->delete();
        return Response::json(['kode'=>200,'message'=>'Data jenis wilayah user berhasil dihapus'],200);
    }
    
    function getJenisWilayahUser(){
        $jenis_wilayah_user = JenisWilayahUser::orderBy('nilai')->get();
        return Response::json(['jenis_wilayah_user'=>$jenis_wilayah_user]);
    }
}
