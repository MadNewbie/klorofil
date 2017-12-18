<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Validator;

use App\Models\Wilayah\KabupatenKota;

class KabKotaController extends Controller
{
    public function getIndex(){
      $sectionTitle="Kabupaten/Kota";
    	$kabkota=KabupatenKota::orderBy('name')->paginate(10);
      return view('kabupaten_kota.index',[
        'sectiontitle'=>$sectionTitle,
        'datas'=>$kabkota,
      ]);
    }
}
