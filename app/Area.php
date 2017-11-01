<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';
    
    function plantGenerals(){
        return $this->hasMany('App\PlantGeneral');
    }
    
    function kelurahanDesa(){
        return $this->belongsTo('App\KelurahanDesa');
    }
    
    function detailArea(){
        return $this->belongsTo('App\DetailArea');
    }
    
    function typeArea(){
        return $this->belongsTo('App\TypeArea');
    }
}
