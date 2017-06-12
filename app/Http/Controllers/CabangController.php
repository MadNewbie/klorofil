<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function getIndex() {
        return view('cabang.index');
    }
}
