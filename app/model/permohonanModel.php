<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class permohonanModel extends Model
{
    protected $table        = "permohonan";
    protected $primaryKey   = "permohonan_id";
    
    function Getperusahaan(){
        return $this->belongsTo('App\model\perusahaanModel', 'perusahaan_id');
    }
    function Getizin(){
        return $this->belongsTo('App\model\opdIzinModel', 'opdi_id');
    }
    function GetPersyaratan(){
        return $this->hasMany('App\model\permohonanPersyaratanM', 'permohonan_id');
    }
    function Getopd(){
        return $this->belongsTo('App\model\opdModel', 'opd_id');
    }
    function Getpengurus(){
        return $this->belongsTo('App\model\pengurusM', 'perusahaanp_id');
    }
    public function scopedatandi(){
        return "andi";
    }
}
