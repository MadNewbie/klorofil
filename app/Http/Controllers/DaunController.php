<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaunController extends Controller
{
    public function getIndex() {
        return view('daun.index');
    }
}
