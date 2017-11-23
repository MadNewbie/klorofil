<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $table = 'diseases';
    
    function plantHealth(){
        return $this->hasMany('App\PlantHealth');
    }
    
    function diseaseType(){
        return $this->belongsTo('App\DiseaseType');
    }
}
