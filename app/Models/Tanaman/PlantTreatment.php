<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantTreatment extends Model
{
    protected $table = 'plant_treatments';
   
    function plantTreatmentDetail(){
        return $this->hasOne('App\PlantTreatmentDetail');
    }
    
    function treatment(){
        return $this->belongsTo('App\Treatment');
    }
    
}
