<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Model;

class KelurahanDesa extends Model
{
    protected $table = 'kelurahan_desas';
    
    function areas(){
        return $this->hasMany('App\Area');
    }
    
    function kecamatan(){
        return $this->belongsTo('App\Kecamatan');
    }
    
    function kabupatenKota(){
        return $this->belongsTo('App\KabupatenKota');
    }
}
