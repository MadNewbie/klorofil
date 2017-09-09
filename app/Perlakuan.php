<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perlakuan extends Model
{
    protected $table = "perlakuan";
    protected $primaryKey = "id_perlakuan";
    //
    public function jenisPerlakuan() {
        return $this->belongsTo('App\JenisPerlakuan', 'id_jenis_perlakuan');
    }
}
