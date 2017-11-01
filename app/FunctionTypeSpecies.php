<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FunctionTypeSpecies extends Model
{
    protected $table = 'function_type_species';
    
    function species(){
        return $this->hasMany('App\Species');
    }
    
    function speciesType(){
        return $this->belongsTo('App\SpeciesType');
    }
}
