<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table = "penyakit";
    protected $primaryKey = "id_penyakit";
    //
    
    public function jenisPenyakit() {
        return $this->belongsTo('App\JenisPenyakit', 'id_jenis_penyakit');
    }
}
