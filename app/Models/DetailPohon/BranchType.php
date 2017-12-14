<?php

namespace App\Models\DetailPohon;

use Illuminate\Database\Eloquent\Model;

class BranchType extends Model
{
    protected $table = 'branch_types';
    
    function species(){
        return $this->hasMany('App\Species');
    }
}
