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
      $permission->name=$input['name'];
      $permission->display_name=$input['display_name'];
      $permission->description=$input['description'];
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
   * @param  int  $id (Unused)
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request){
      $rule=array(
        'name'=>'required|unique:permissions',
        'display_name'=>'required',
      );
      $input = $request->all();
      $validator = Validator::make($input,$rule);
      if($validator->fails()){
          return response::json(['kode'=>404,'message'=>$validator->errors()],200);
      }
      //
      $permission=Permission::find($input['id']);
      if(!$permission){
        return Response::json(['kode'=>404,'message'=>'Data tidak ditemukan'],200);
      }
      $permission->name=($permission->name==$input['name']? $permission->name : $input['name']);
      $permission->display_name=($permission->display_name==$input['display_name']? $permission->display_name : $input['display_name']);
      $permission->description=($permission->description==$input['description']? $permission->description : $input['description']);
      $permission->updated_by=1;
      $permission->update();
      return Response::json(['kode'=>200,'message'=>'Data berhasil diubah'],200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id){
      $permissions=Permission::find($id);
      $permissions->delete();
      return Response::json(['message'=>'Data berhasil dihapus','kode'=>200],200);
  }

  public function retrieve(){
    $permissions=Permission::orderBy('name')->get();
    return Response::json(['permission'=>$permissions]);
  }
}
