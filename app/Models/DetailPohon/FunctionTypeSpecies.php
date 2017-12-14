<?php

namespace App\Models\DetailPohon;

use Illuminate\Database\Eloquent\Model;

class FunctionTypeSpecies extends Model
{
    protected $table = 'function_type_species';

    function species(){
        return $this->hasMany('App\Models\DetailPohon\Species');
    }

    function speciesType(){
        return $this->belongsTo('App\Models\DetailPohon\SpeciesType');
    }
}
