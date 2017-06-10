<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function getIndex() {
        return view('penyakit.index');
    }
}
