<?php

namespace App\Models\DetailPohon;

use Illuminate\Database\Eloquent\Model;

class LeafType extends Model
{
    protected $table = 'leaf_types';
    protected $fillable = ['leaf_type_name'];

    function species(){
        return $this->hasMany('App\Models\DetailPohon\Species');
    }
}
