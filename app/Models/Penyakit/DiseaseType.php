<?php

namespace App\Models\Penyakit;

use Illuminate\Database\Eloquent\Model;

class DiseaseType extends Model
{
    protected $table = 'disease_types';

    function speciesType(){
        return $this->belongsTo('App\Models\DetailPohon\SpeciesType');
    }

    function diseases(){
        return $this->hasMany('App\Models\Penyakit\Disease');
    }
}
