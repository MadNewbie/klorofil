<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Model;

class DetailArea extends Model
{
    protected $table = 'detail_areas';
    
    function area(){
        return $this->hasOne('App\Area');
    }
}
