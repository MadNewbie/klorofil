<?php

namespace App\Models\DetailPohon;

use Illuminate\Database\Eloquent\Model;

class TrunkType extends Model
{
    protected $table = 'trunk_types';

    function species(){
        return $this->hasMany('App\Models\DetailPohon\TrunkType');
    }
}
