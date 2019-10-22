<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table="areas"; 
    public  function tourtype (){
        return $this->hasMany('App\TourType','area_id','area_id');
                            //area_id khoa ngoai tourtype //area_id khoa chinh
    }

    public  function tour (){
        return $this->hasManyThrough('App\Tour','App\TourType', 'area_id', 'tour_type_id','area_id' );
                 //area_id khoa ngoai cua tourtype //tour_type_id(lay trong data cua tour)// area_id khoa chinh cua area
    }


}
