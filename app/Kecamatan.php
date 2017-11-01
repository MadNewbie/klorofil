<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatans';
    
    function kelurahanDesas(){
        return $this->hasMany('App\Kecamatan');
    }
    
    function kabupatenKota(){
        return $this->belongsTo('App\KabupatenKota')
    }
}
