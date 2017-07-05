<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamaIlmiah extends Model
{
    //
    public function namaLokal() {
        return $this->hasMany('App\NamaLokal');
    }
}
