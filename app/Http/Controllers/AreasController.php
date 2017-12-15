<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Validator;

use App\Models\Wilayah\Area;

class AreasController extends Controller
{
    public function getIndex(){
      $area=Area::orderBy('name')->paginate(10);
        return view('area.index',[
          'datas'=>$area,
        ]);
    }
}
