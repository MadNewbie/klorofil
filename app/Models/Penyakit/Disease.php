<?php

namespace App\Models\Penyakit;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $table = 'diseases';

    function plantHealth(){
        return $this->hasMany('App\Models\Tanaman\PlantHealth');
    }

    function diseaseType(){
        return $this->belongsTo('App\Models\Penyakit\DiseaseType');
    }
}
