<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiseaseType extends Model
{
    protected $table = 'disease_types';
    
    function speciesType(){
        return $this->belongsTo('App\SpeciesType');
    }
    
    function diseases(){
        return $this->hasMany('App\Disease');
    }
}
