<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisAkunController extends Controller
{
    public function getIndex() {
        return view('jenis_akun.index');
    }
}
