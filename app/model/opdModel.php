<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class opdModel extends Model
{
    protected $table        = "opd";
    protected $primaryKey   = "opd_id";
    
    function izin(){
        return $this->hasMany('App\model\opdIzinModel', 'opd_id');
    }
}
