<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function getIndex() {
        return view('provinsi.index');
    }
}
