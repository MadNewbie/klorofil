<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Permission extends EntrustPermission
{
    //
    protected $table="permissions";
    protected $primaryKey="id_permission";

    protected $fillable=['name','display_name','description'];

    function Role(){
      return $this->belongsTo('App\Models\Role');
    }
}