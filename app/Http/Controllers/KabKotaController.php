<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KabKota;
use Illuminate\Support\Facades\Response;
use Validator;

class KabKotaController extends Controller
{
    public function getIndex(){
    	$kabkota = KabKota::orderBy('name')->paginate(10);
        return view('kabkota.index',['datas'=>$kabkota]);
    }
}
