<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RootType extends Model
{
    protected $table = 'root_types';
    
    function species(){
        return $this->hasMany('App\Species');
    }
}
