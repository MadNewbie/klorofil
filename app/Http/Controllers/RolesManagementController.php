<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User\Role;
use Illuminate\Support\Facades\Response;
use Validator;

class RolesManagementController extends Controller
{
  //User Role(s) management CRUD controller

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
      $sectionTitle="Role(s) Management";
      $roles=Role::orderBy('id')->paginate(10);
      return view('akun.rolesmanagement',[
        'sectiontitle'=>$sectionTitle,
        'datas'=>$roles,
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
        $role=new Role();
        $role->name=$input['name'];
        $role->display_name=$input['display_name'];
        $role->description=$input['description'];
        $role->created_by=1;
        $role->updated_by=1;
        if($role->save()){
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
          'name'=>'required|unique:roles',
          'display_name'=>'required',
        );
        $input = $request->all();
        $validator = Validator::make($input,$rule);
        if($validator->fails()){
            return response::json(['kode'=>404,'message'=>$validator->errors()],200);
        }
        //
        $role=Role::find($input['id']);
        if(!$role){
          return Response::json(['kode'=>404,'message'=>'Data tidak ditemukan'],200);
        }
        $role->name=($role->name==$input['name']? $role->name : $input['name']);
        $role->display_name=($role->display_name==$input['display_name']? $role->display_name : $input['display_name']);
        $role->description=($role->description==$input['description']? $role->description : $input['description']);
        $role->updated_by=1;
        $role->update();
        return Response::json(['kode'=>200,'message'=>'Data berhasil diubah'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $roles=Role::find($id);
        $roles->delete();
        return Response::json(['message'=>'Data berhasil dihapus','kode'=>200],200);
    }

    public function retrieve(){
      $roles=Role::orderBy('name')->get();
      return Response::json(['role'=>$roles]);
    }
  }
