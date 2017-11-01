<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getGuestIndex() {
        return view('front-end.homescreen');
    }
    
    public function getAdminIndex() {
        return view('admin.index');
    }
}
