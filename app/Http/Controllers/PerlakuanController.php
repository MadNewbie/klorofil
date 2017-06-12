<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerlakuanController extends Controller
{
    public function getIndex() {
        return view('perlakuan.index');
    }
}
