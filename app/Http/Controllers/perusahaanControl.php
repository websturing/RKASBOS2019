<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class perusahaanControl extends Controller
{
    function list(){
        $list = DB::table('perusahaan')->get();
    
        return $list;
    }
    function pengurus(Request $request){
        $id = $request->get('id');
        
        $list = DB::table('perusahaan_pemohon')
                    ->where('perusahaan_id', $id)
                    ->get();
        $listCount = DB::table('perusahaan_pemohon')
                    ->where('perusahaan_id', $id)
                    ->count();
        
        $count = array( 
                "pengurus" => $list,
                "jumlah" => $listCount.' Anggota Perusahaan',
                "icon" => "icon-user-tie",
                "show" => "true",
        );
        
        return $count;
    }
    function update(Request $request){
       date_default_timezone_set("Asia/Bangkok");
       $timestamp       = date("Y-m-d H:i:s");
       $perusahaan      = json_decode($request->get('perusahaan'));
      
     
        $perusahaan_array = array( "status" => $perusahaan->status,
                                  "nama" => $perusahaan->nama,
                                  "email" => $perusahaan->email,
                                  "contact" => $perusahaan->contact,
                                  "alamat" => $perusahaan->alamat,
                                  "update_at" => $timestamp,
                                  "npwp" => $perusahaan->npwp);  
            
           $prs_pemohon  = DB::table('perusahaan')
                            ->where('perusahaan_id',$perusahaan->perusahaan_id) 
                            ->update($perusahaan_array);  
//        
        
        
        $perusahaanData = DB::table('perusahaan')
                            ->where('perusahaan_id', $perusahaan->perusahaan_id)
                            ->get();
        
        foreach($perusahaanData as $a){
            $perusahaan_status = strtolower($a->status);
            $icon =  null;
            
            
            
            if($perusahaan_status == 'perorangan'){
                $icon = "man-user.png";
                $perusahaanNama = strtoupper($a->nama);
            }
            else{
               $icon = "office.png"; 
               $perusahaanNama = strtoupper($perusahaan_status).". ". ucwords(strtolower($a->nama));
            }
            
            
            $b = array(
                "perusahaan"  => $a,
                "icon" => $icon,
                "perusahaanNama" => $perusahaanNama,
            );
            
            $data[] = $b;
        }
        return $data;
    }
}
