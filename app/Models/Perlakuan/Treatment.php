<?php

namespace App\Models\Perlakuan;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatments';

    function plantTreatments(){
        return $this->hasMany('App\Models\Perlakuan\PlantTreatment');
    }

    function speciesType(){
        return $this->belongsTo('App\Models\DetailPohon\SpeciesType');
    }
}
