<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisPenyakitController extends Controller
{
    public function getIndex() {
        return view('jenis_penyakit/index');
    }
}
