<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NamaLokalController extends Controller
{
    public function getIndex() {
        return view('nama_lokal.index');
    }
}
