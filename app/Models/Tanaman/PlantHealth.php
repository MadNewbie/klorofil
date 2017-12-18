<?php

namespace App\Models\Tanaman;

use Illuminate\Database\Eloquent\Model;

class PlantHealth extends Model
{
    protected $table = 'plant_healths';

    function plantPhysical(){
        return $this->hasOne('App\Models\Tanaman\PlantPhysical');
    }

    function disease(){
        return $this->belongsTo('App\Models\Penyakit\Disease');
    }
}
