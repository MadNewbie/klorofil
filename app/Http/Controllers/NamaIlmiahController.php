<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NamaIlmiahController extends Controller
{
    public function getIndex() {
        return view('nama_ilmiah.index');
    }
}
