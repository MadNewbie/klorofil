<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Response;
use Validator;

class PermissionsManagementController extends Controller
{
  //User Permission management CRUD controller
  public function getIndex(){
    $sectionTitle="Permission(s) Management";
    return view('akun.permissionsmanagement',[

    ]);
  }
}
