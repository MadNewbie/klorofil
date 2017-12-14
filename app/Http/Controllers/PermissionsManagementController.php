<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\Permission;
use Illuminate\Support\Facades\Response;
use Validator;

class PermissionsManagementController extends Controller
{
  //User Permission management CRUD controller
  public function getIndex(){
    $sectionTitle="Permission(s) Management";
    $permissions=Permission::orderBy('id')->paginate(10);
    return view('akun.permissionsmanagement',[
      'sectiontitle'=>$sectionTitle,
      'permissions'=>$permissions,
    ]);
  }
}
