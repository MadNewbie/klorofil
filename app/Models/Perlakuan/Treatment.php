<?php

namespace App\Models\Pelakuan;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatments';
    
    function plantTreatments(){
        return $this->hasMany('App\PlantTreatment');
    }
    
    function speciesType(){
        return $this->belongsTo('App\SpeciesType');
    }
}
