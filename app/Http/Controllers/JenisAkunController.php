<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisUser;
use Illuminate\Support\Facades\Response;

class JenisAkunController extends Controller
{
    public function getIndex() {
        $jenis_user = JenisUser::orderBy('id_jenis_wilayah_user')->paginate(7);
        return view('jenis_akun.index',['jenis_users'=>$jenis_user]);
    }
    
    public function postCreateJenisAkun(Request $request) {
        $this->validate($request,[
            'nama_jenis_akun'=>'required|unique:jenis_user',
            'id_jenis_wilayah_user'=>'required'
        ]);
        $jenis_user = new JenisUser();
        $jenis_user->nama_jenis_akun = $request['nama_jenis_akun'];
        $jenis_user->id_jenis_wilayah_user = $request['id_jenis_wilayah_user'];
        if($jenis_user->save()){
            return Response::json(['kode'=>200,'message'=>'Data jenis akun berhasil ditambahkan'],200);
        }
        return Response::json(['kode'=>404,'message'=>'Error pada proses penyimpanan'],404);
    }
    
    public function postUpdateJenisAkun(Request $request) {
        $this->validate($request, [
            'nama_jenis_akun'=>'required',
            'id_jenis_wilayah_user'=>'required'
        ]);
        $jenis_user = JenisUser::find($request['id_jenis_user']);
        if(!$jenis_user){
            return Response::json([['kode'=>404,'message'=>'Data jenis user tidak ditemukan']],404);
        }
        $jenis_user->nama_jenis_akun = $request['nama_jenis_akun'];
        $jenis_user->id_jenis_wilayah_user = $request['id_jenis_wilayah_user'];
        $jenis_user->update();
        return Response::json(['kode'=>200,'message'=>'Data jenis user telah diperbarui'],200);
    }
    
    public function getDeleteJenisAkun($id_jenis_user) {
        $jenis_user = JenisUser::find($id_jenis_user);
        $jenis_user->delete();
        return Response::json(['kode'=>200,'message'=>'Data jenis user telah dihapus'],200);
    }
    
    public function getJenisAkun() {
        $jenis_user = JenisUser::orderBy('id_jenis_wilayah_user')->get();
        return Response::json(['jenis_user'=>$jenis_user]);
    }
}
