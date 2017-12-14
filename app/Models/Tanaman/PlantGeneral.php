<?php

namespace App\Models\Tanaman;

use Illuminate\Database\Eloquent\Model;

class PlantGeneral extends Model
{
    protected $table = 'plant_generals';
    
    function species(){
        return $this->belongsTo('App\Species');
    }
    
    function area(){
        return $this->belongsTo('App\Area');
    }
    
    function plantPhysical(){
        return $this->belongsTo('App\PlantPhysical');
    }
    
    function plantTreatmentDetail(){
        return $this->belongsTo('App\PlantTreatmentDetail');
    }
}
