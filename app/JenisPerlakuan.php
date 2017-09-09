<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPerlakuan extends Model
{
    protected $table = "jenis_perlakuan";
    protected $primaryKey = "id_jenis_perlakuan";    
    //
    
    public function perlakuan() {
        return $this->hasMany('App\Perlakuan', 'id_jenis_perlakuan');
    }
}
