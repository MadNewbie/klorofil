<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Response;

class AkunController extends Controller
{
    public function getIndex() {
        $user = User::orderBy('id_jenis_user')->paginate(7);
        return view('akun.index',['users'=>$user]);
    }
    
    public function postCreateAkun(Request $request) {
        $this->validate($request,[
            'nama'=>'required',
            'username'=>'required|unique:users',
            'id_jenis_user'=>'required'
        ]);
    }
    
    public function postUpdateAkun(Request $request) {
        
    }
    
    public function getResetPassword($id_user) {
        
    }
    
    public function getDeleteAkun($id_user) {
        
    }
}
