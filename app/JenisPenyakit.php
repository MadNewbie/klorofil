<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPenyakit extends Model
{
    protected $table = "jenis_penyakit";
    protected $primaryKey = "id_jenis_penyakit";
    
    public function penyakit() {
        return $this->hasMany('App\Penyakit', 'id_jenis_penyakit');
    }
}
