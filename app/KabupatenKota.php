<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    protected $table = 'kabupaten_kotas';
    
    function kecamatans(){
        return $this->hasMany('App\Kecamatan');
    }
    
    function kelurahanDesas(){
        return $this->hasMany('App\KelurahanDesa');
    }
    
    function provinsi(){
        return $this->belongsTo('App\Provinsi');
    }
}
