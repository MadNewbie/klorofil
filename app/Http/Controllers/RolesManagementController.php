<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\Role;
use Illuminate\Support\Facades\Response;
use Validator;

class RolesManagementController extends Controller
{
  //User Role(s) management CRUD controller
  public function getIndex(){
      $sectionTitle="Role(s) Management";
      $roles=Role::orderBy('id')->paginate(10);
      return view('akun.rolesmanagement',[
        'sectiontitle'=>$sectionTitle,
        'datas'=>$roles,
      ]);
  }
}
