<?php

namespace App\Http\Controllers;

use App\User;
//use App\Models\User;
use App\Role;
//use App\Models\User;
use App\Permission;
//use App\Models\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class UserManagementController extends Controller
{
    //User management CRUD section
    public function getUsermanIndex() {
        $sectionTitle="Users Management";
        $users=User::orderBy('id')->paginate(10);
        return view('akun.usersmanagement',[

        ]);
    }

    //User Role management CRUD section
    public function getRolesmanIndex(){
        $sectionTitle="Role(s) Management";
        $roles=Role::orderBy('id')->paginate(10);
        return view('akun.rolesmanagement',[
          'jenis_users'=>$roles,
        ]);
    }

    //User Permission management CRUD section
    public function getPermissionsmanIndex(){
        $sectionTitle="Permission(s) Management";
        return view('akun.permissionsmanagement',[

        ]);
    }
}
