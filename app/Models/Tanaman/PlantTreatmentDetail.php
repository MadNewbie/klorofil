<?php

namespace App\Models\Tanaman;

use Illuminate\Database\Eloquent\Model;

class PlantTreatmentDetail extends Model
{
    protected $table = 'plant_treatment_details';
    
    function plantGenerals(){
        return $this->hasMany('App\PlantGeneral');
    }
    
    function plantTreatment(){
        return $this->belongsTo('App\PlantTreatment');
    }
}
