<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NamaIlmiah;

class NamaIlmiahController extends Controller
{
    public function getIndex() {
        return view('nama_ilmiah.index');
    }
    
    public function postAddNamaIlmiah(Request $request){
        $namaIlmiah = new NamaIlmiah();
        $nama_ilmiah = $request->nama_ilmiah;
        $namaIlmiah->nama_ilmiah = $nama_ilmiah;
        $namaIlmiah->save();
    }
    
    function getDeleteNamaIlmiah($id) {
        
    }
}
