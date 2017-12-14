<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Kecamatan;
use App\Models\Wilayah\Kecamatan;
use Illuminate\Support\Facades\Response;
use Validator;

class KecamatanController extends Controller
{
    public function getIndex(){
      $sectionTitle="Kecamatan";
      $kecamatan=Kecamatan::orderBy('name')->paginate(10);

      return view('kecamatan.index',[
        'datas'=>$kecamatan,
        'sectiontitle'=>$sectionTitle,
      ]);
    }
}
