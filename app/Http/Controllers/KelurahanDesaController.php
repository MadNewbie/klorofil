<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelurahanDesaController extends Controller
{
    public function getIndex() {
        return view('kelurahan_desa.index');
    }
}
