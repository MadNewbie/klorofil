<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeArea extends Model
{
    protected $table = 'type_areas';
    
    function areas(){
        return $this->hasMany('App\Area');
    }
}
