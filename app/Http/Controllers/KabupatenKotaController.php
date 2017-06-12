<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KabupatenKotaController extends Controller
{
    public function getIndex() {
        return view('kabupaten_kota.index');
    }
}
