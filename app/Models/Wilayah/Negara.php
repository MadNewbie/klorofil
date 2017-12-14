<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    protected $table = 'negaras';
    protected $detail_area = array('detail_area');

    function provinsis(){
        return $this->hasMany('App\Provinsi');
    }

    function setDetailAreaAttribute(array $value){
        $area = implode(',', $value);
//        dd($area);
        \DB::beginTransaction();
        $this->attributes['detail_area'] = \DB::raw( sprintf("PolygonFromText('POLYGON((%s))')", $area));
        if($this->save()){
            \DB::commit();
            return true;
        }else{
            \DB::rollBack();
        }
    }

    function getDetailAreaAttribute($value){
        $loc = substr($value,8);
        $loc = preg_replace('/[,]+/',',',$loc,1);
        return substr($loc,0,-1);
    }

    function newQuery($excludeDeleted = true) {
        $raw='';
        foreach($this->detail_area as $column){
            $raw .= ' astext('.$column.') as '.$column.' ';
        }
        return parent::newQuery($excludeDeleted)->addSelect('*',\DB::raw($raw));
    }
}
