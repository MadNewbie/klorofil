<?php

namespace App\Models\DetailPohon;

use Illuminate\Database\Eloquent\Model;

class SpeciesType extends Model
{
    protected $table = 'species_types';

    function functionTypeSpecies(){
        return $this->hasMany('App\Models\DetailPohon\FunctionTypeSpecies');
    }

    function species(){
        return $this->hasMany('App\Models\DetailPohon\Species');
    }

    function treatments(){
        return $this->hasMany('App\Models\Perlakuan\Treatment');
    }

    function diseaseTypes(){
        return $this->hasMany('App\Models\Penyakit\DiseaseType');
    }
}
