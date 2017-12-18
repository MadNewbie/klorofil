<?php

namespace App\Models\DetailPohon;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    protected $table = 'species';
    
    function plantGenerals(){
        return $this->hasMany('App\Models\Tanaman\PlantGenral');
    }
    
    function commonNames(){
        return $this->hasMany('App\Models\DetailPohon\CommonName');
    }
    
    function leafType(){
        return $this->belongsTo('App\Models\DetailPohon\LeafType');
    }
    
    function branchType(){
        return $this->belongsTo('App\Models\DetailPohon\BranchType');
    }
    
    function trunkType(){
        return $this->belongsTo('App\Models\DetailPohon\TrunkType');
    }
    
    function rootType(){
        return $this->belongsTo('App\Models\DetailPohon\RootType');
    }
    
    function habitatSpecies(){
        return $this->hasMany('App\Models\DetailPohon\HabitatSpecies');
    }
    
    function functionTypeSpecies(){
        return $this->belongsTo('App\Model\DetailPohon\FunctionTypeSpecies');
    }
    
    function speciesType(){
        return $this->belongsTo('App\Model\DetailPohon\SpeciesType');
    }
}
