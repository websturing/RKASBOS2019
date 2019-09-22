<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class opdIzinModel extends Model
{
    protected $table        = "opd_izin";
    protected $primaryKey   = "opdi_id";
    
    function opd(){
        return $this->belongsTo('App\model\opdModel', 'opd_id');
    }
    function persyaratan(){
        return $this->hasmany('App\model\persyaratanModel', 'opdi_id');
    }
}
