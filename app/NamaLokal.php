<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamaLokal extends Model
{
    //
    public function namaIlmiah() {
        return $this->belongsTo('App\NamaIlmiah');
    }
}
