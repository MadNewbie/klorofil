<?php

namespace App\Models\DetailPohon;

use Illuminate\Database\Eloquent\Model;

class CommonName extends Model
{
    protected $table = 'common_names';
    
    function species(){
        return $this->belongsTo('App\Species');
    }
}
