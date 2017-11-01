<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeafType extends Model
{
    protected $table = 'leaf_types';
    
    function species(){
        return $this->hasMany('App\Species');
    }
}
