<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HabitatController extends Controller
{
    public function getIndex() {
        return view('habitat.index');
    }
}
