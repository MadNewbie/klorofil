<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamaLokal extends Model
{
    protected $table = "nama_lokal";
    protected $primaryKey = "id_nama_lokal";
    //
    public function namaIlmiah() {
        return $this->belongsTo('App\NamaIlmiah','id_nama_ilmiah');
    }
}
