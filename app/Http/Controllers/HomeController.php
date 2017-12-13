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

    public function getMinisteredIndex(){
    	return view('ministered.ministered');
    }

    public function getBlogIndex() {
    	return view('front-end.blog');
    }

    public function getGuestOverview() {
    	return view('front-end.overview');
    }

    public function getGuestInformation() {
    	return view('front-end.information');
    }
}
