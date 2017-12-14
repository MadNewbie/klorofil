<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\KelurahanDesa;
use App\Models\Wilayah\KelurahanDesa;
use Illuminate\Support\Facades\Response;
use Validator;

class KelDesaController extends Controller
{
    public function getIndex(){
      $sectionTitle="Kelurahan/Desa";
      $keldesa=KelurahanDesa::orderBy('name')->paginate(10);

      return view('kelurahan_desa.index',[
        'datas'=>$keldesa,
        'sectiontitle'=>$sectionTitle,
      ]);
    }
}
