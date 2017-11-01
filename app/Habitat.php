<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{
    protected $table = 'habitats';
    
    function species(){
        return $this->hasMany('App\Species');
    }
    
    function habitatSpecies(){
        return $this->hasMany('App\HabitatSpecies');
    }
}
