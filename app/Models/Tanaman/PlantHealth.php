<?php

namespace App\Models\Tanaman;

use Illuminate\Database\Eloquent\Model;

class PlantHealth extends Model
{
    protected $table = 'plant_healths';
    
    function plantPhysical(){
        return $this->hasOne('App\PlantPhysical');
    }
    
    function disease(){
        return $this->belongsTo('App\Disease');
    }
}
