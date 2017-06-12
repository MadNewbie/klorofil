<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BungaController extends Controller
{
    public function getIndex() {
        return view('bunga.index');
    }
}
