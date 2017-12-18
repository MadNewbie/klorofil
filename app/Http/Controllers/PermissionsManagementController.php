<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\Permission;
use Illuminate\Support\Facades\Response;
use Validator;

class PermissionsManagementController extends Controller
{
  //User Permission management CRUD controller

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
    $sectionTitle="Permission(s) Management";
    $permissions=Permission::orderBy('id')->paginate(10);
    return view('akun.permissionsmanagement',[
      'sectiontitle'=>$sectionTitle,
      'datas'=>$permissions,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
      $rule=array(
          'name'=>'required',
          'display_name'=>'required',
      );
      $input = $request->all();
      $validator = Validator::make($input,$rule);
      if($validator->fails()){
          return Response::json(['kode'=>404,'message'=>$validator->errors()],200);
      }
      $permission=new Permission();
      $permission->name=$input['permission_name'];
      $permission->display_name=$input['permission_display_name'];
      $permission->description=$input['permission_description'];
      $permission->created_by=1;
      $permission->updated_by=1;
      if($permission->save()){
        return Response::json(['kode'=>200,'message'=>'Data Berhasil Tersimpan'],200);
      }
      return Response::json(['kode'=>404,'message'=>'Data Tidak Berhasil Tersimpan'],200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
