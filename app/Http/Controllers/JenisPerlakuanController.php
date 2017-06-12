<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JenisPerlakuanController extends Controller
{
    public function getIndex() {
        return view('jenis_perlakuan.index');
    }
}
