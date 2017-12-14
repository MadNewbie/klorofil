<?php

namespace App\Http\Controllers;

//use App\User;
use App\Models\User\User;
//use App\Role;
// use App\Models\Role;
//use App\Permission;
// use App\Models\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class UsersManagementController extends Controller
{
    //User management CRUD controller
    public function getIndex() {
        $sectionTitle="User(s) Management";
        $users=User::orderBy('id')->paginate(10);
        return view('akun.usersmanagement',[
          'sectiontitle'=>$sectionTitle,
          'users'=>$users,
        ]);
    }
}
