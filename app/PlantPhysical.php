<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantPhysical extends Model
{
    protected $table = 'plant_physicals';
    
    function plantGenerals(){
        return $this->hasMany('App\PlantGeneral');
    }
    
    function plantHealth(){
        return $this->belongsTo('App\PlantHealth');
    }
    
    function plantPhoto(){
        return $this->belongsTo('App\PlantPhoto');
    }
}
