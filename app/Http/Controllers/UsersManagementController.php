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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $sectionTitle="User(s) Management";
        $users=User::orderBy('id')->paginate(10);
        return view('akun.usersmanagement',[
          'sectiontitle'=>$sectionTitle,
          'datas'=>$users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
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
    // public function update(Request $request, $id)
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
    }

    public function retrieve()
    {
        //
    }
}
