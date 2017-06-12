<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function getIndex() {
        return view('kecamatan.index');
    }
}
