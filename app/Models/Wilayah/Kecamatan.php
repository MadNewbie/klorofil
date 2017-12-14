<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatans';

    function kelurahanDesas(){
        return $this->hasMany('App\KelurahanDesa');
    }

    function kabupatenKota(){
        return $this->belongsTo('App\KabupatenKota');
    }
}
