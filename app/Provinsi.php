<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsis';
    
    function kabupatenKotas(){
        return $this->hasMany('App\KabupatenKota');
    }
    
    function negara(){
        return $this->belongsTo('App\Negara');
    }
}
