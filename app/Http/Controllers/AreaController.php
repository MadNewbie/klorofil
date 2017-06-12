<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaController extends Controller
{
   public function getIndex() {
        return view('area.index');
    }
}
