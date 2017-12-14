<?php

namespace App\Models\DetailPohon;

use Illuminate\Database\Eloquent\Model;

class SpeciesType extends Model
{
    protected $table = 'species_types';
    
    function functionTypeSpecies(){
        return $this->hasMany('App\FunctionTypeSpecies');
    }
    
    function species(){
        return $this->hasMany('App\Species');
    }
    
    function treatments(){
        return $this->hasMany('App\Treatment');
    }
    
    function diseaseTypes(){
        return $this->hasMany('App\DiseaseType');
    }
}
