<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantPhoto extends Model
{
    protected $table = 'plant_photos';
    
    function plantPhysical(){
        return $this->hasOne('App\PlantPhoto');
    }
}
