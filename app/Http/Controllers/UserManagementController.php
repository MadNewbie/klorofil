<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class UserManagementController extends Controller
{
    public function getUsermanIndex() {
        return view('akun.usersmanagement');
    }

    public function getRolesmanIndex(){
        return view('akun.rolesmanagement');
    }

    public function getPermissionsmanIndex(){
        return view('akun.rolesmanagement');
    }
}
