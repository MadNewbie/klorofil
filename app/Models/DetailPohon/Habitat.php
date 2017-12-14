<?php

namespace App\Models\DetailPohon;

use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{
    protected $table = 'habitats';

    function species(){
        return $this->hasMany('App\Models\DetailPohon\Species');
    }

    function habitatSpecies(){
        return $this->hasMany('App\HabitatSpecies');
    }
}
