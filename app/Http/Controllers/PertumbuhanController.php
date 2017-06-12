<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PertumbuhanController extends Controller
{
    public function getIndex() {
        return view('pertumbuhan.index');
    }
}
