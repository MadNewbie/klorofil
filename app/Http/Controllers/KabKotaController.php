<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Validator;

use App\KabupatenKota;

class KabKotaController extends Controller
{
    public function getIndex(){
    	$kabkota = KabupatenKota::orderBy('name')->paginate(10);
        return view('kabupaten_kota.index',['datas'=>$kabkota]);
    }
}
