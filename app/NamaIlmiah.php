<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamaIlmiah extends Model
{
    protected $table="nama_ilmiah";
    protected $primaryKey="id_nama_ilmiah";
    //
    public function namaLokal() {
        return $this->hasMany('App\NamaLokal','id_nama_ilmiah');
    }
}
