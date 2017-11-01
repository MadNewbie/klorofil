<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $table = 'species';
    
    function plantGenerals(){
        return $this->hasMany('App\PlantGenral');
    }
    
    function commonNames(){
        return $this->hasMany('App\CommonName');
    }
    
    function leafType(){
        return $this->belongsTo('App\LeafType');
    }
    
    function branchType(){
        return $this->belongsTo('App\BranchType');
    }
    
    function trunkType(){
        return $this->belongsTo('App\TrunkType');
    }
    
    function rootType(){
        return $this->belongsTo('App\RootType');
    }
    
    function habitatSpecies(){
        return $this->hasMany('App\HabitatSpecies');
    }
    
    function functionTypeSpecies(){
        return $this->belongsTo('App\FunctionTypeSpecies');
    }
    
    function speciesType(){
        return $this->belongsTo('App\SpeciesType');
    }
}
