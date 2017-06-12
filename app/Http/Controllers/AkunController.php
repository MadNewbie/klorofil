<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function getIndex() {
        return view('akun.index');
    }
}
