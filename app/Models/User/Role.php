<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends EntrustRole
{
    //
    protected $table="roles";
    protected $primaryKey="id_role";

    protected $fillable=['name','display_name','description'];

    function Permissions(){
      return $this->hasMany('App\Models\Permission');
    }

    function User(){
      return $this->belongsTo('App\Models\User');
    }
}
