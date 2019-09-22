<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use App\model\permohonanModel;
use App\model\perusahaanModel;
use App\model\opdIzinModel;
use App\model\opdModel;
use App\model\persyaratanModel;
use DB;
use PDF;
use Session;


class permohonanControl extends Controller
{
    function index(Request $request ){
        
        $headerPage = $request->get("q");
        $Searching = $request->get("data");
        
        if($headerPage == 'titles'){
            $titles['titles'] = array(
                'name' => "Dashboard", 
                'subtitle' => "Front Office",
                'page' => "Dashboard Page"
            );
            
            return $titles;
        }
        
        if($headerPage == 'searching' && $Searching != ''){
            $permohonan = permohonanModel::with(['Getperusahaan','Getizin','Getopd'])
                        ->whereHas('Getperusahaan', function($e) use ($Searching){
                               $e->where('perusahaan.nama', 'like', '%' . $Searching . '%')
                               ->orderBy('perusahaan.nama', 'ASC');
                        })
                        ->orwhereHas('Getizin', function($e) use ($Searching){
                               $e->where('opd_izin.nama_izin', 'like', '%' . $Searching . '%')
                               ->orderBy('opd_izin.nama_izin', 'ASC');
                        })
                
                    ->get();
        }
        else{
            $permohonan = permohonanModel::with(['Getperusahaan','Getizin','Getopd'])
                        ->orderBy('create_at', 'desc')
                        ->get();
        }
        
        foreach($permohonan as $a){
            $perusahaan_status = strtolower($a->getperusahaan->status);
            $icon =  null;
            
            if($perusahaan_status == 'perorangan'){
                $icon = "man-user.png";
                $perusahaanNama = strtoupper($a->getperusahaan->nama);
            }
            else{
               $icon = "office.png"; 
               $perusahaanNama = strtoupper($perusahaan_status).". ". ucwords(strtolower($a->getperusahaan->nama));
            }
            
            
            $b = array(
                "permohonan"  => $a,
                "icon" => $icon,
                "perusahaanNama" => $perusahaanNama,
            );
            
            $data[] = $b;
           
           
        }
         
        $render[] = $data;
        
         // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($data);
 
        // Define how many items we want to be visible in each page
        $perPage = 10;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        $paginatedItems->setPath($request->url());
             
        
            
 
        
        
        
        
         return $paginatedItems;
//       return $render;
        
        
    }
    function page(){
         $titles['titles'] = array(
            'name' => "Dashboard", 
            'subtitle' => "Front Office",
            'page' => "Dashboard Page"
        );
        return $titles;
    }
    function peropd(Request $request){
        $headerPage = $request->get("q");
        $Searching = $request->get("data");
        if($headerPage == 'searching' && $Searching != ''){
           $opd = opdModel::with(["izin"])
                ->withCount(["izin"])
                ->where('opd', 'like', '%' . $Searching . '%')
                ->get(); 
        }
        else{
            $opd = opdModel::with(["izin"])
                ->withCount(["izin"])
                ->get();
        }
        
        
        return $opd;
    }
    
    function formulir(Request $request){
        $headerPage = $request->get("q");
        
        if($headerPage == 'titles'){
            $data = $request->get('data');
            $izin = opdIzinModel::with('opd')
                                ->where('opdi_id',$data)->get();
            
            $titles['titles'] = array(
                'name' => strtoupper($izin[0]['nama_izin']), 
                'subtitle' => strtoupper($izin[0]['opd']['opd']), 
                'page' => "FORMULIR PERMOHONAN"
            );
            
            return $titles;
        }
        elseif($headerPage == 'formulir'){
           $data = $request->get('data'); 
           $persyaratan = persyaratanModel::where('opdi_id',$data)->get();
        
            foreach($persyaratan as $a){
                $formulir = array(
                    "opdi_id" => $a->opdi_id,
                    "opdp_id" => $a->opdp_id,
                    "syarat"  => $a->persyaratan,
                    "status" => "false",
                    "keterangan" => "",
                    "filedata" => "",
                );
                $prsData[] = $formulir;    
                    
            }            
            return $prsData;
        }
       
        
    }
    function Insert(Request $request){
       
       date_default_timezone_set("Asia/Bangkok");
       $timestamp       = date("Y-m-d H:i:s");
        
   
        
       $perusahaan      = json_decode( $request->get('perusahaan'));
       $pengurus        = json_decode( $request->get('pengurus'));
       $opd             = json_decode( $request->get('opd'));
       $permohonan      = json_decode( $request->get('permohonan'));
       $persyaratan     = $request->get('persyaratan');
        
      
      
       $perusahaan_id = $perusahaan->perusahaan_id;    
       $pengurus_id   = $pengurus->perusahaanp_id;    

         
//        
        
        
        
        
        /* INSERT / UPDATE PERUSAHAAN DATA */    
        if(empty($perusahaan->perusahaan_id)){
            $code ='PRSH';
            $pegawaiCode = DB::table('perusahaan')->where('perusahaan_code', 'like', '%' . $code . '%')->max('perusahaan_code');
            $idmax1 = $pegawaiCode;
            $nourut1 = (int) substr($idmax1, 4,5);
            $nourut1++;
            $PRSH = $code . sprintf("%05s", $nourut1);
            
            $perusahaan_array = array( "status" => $perusahaan->status,
                                  "perusahaan_code" => $PRSH,
                                  "nama" => $perusahaan->nama,
                                  "email" => $perusahaan->email,
                                  "contact" => $perusahaan->hp,
                                  "alamat" => $perusahaan->alamat,
                                  "create_at" => $timestamp,
                                  "update_at" => $timestamp,
                                  "npwp" => $perusahaan->npwp,
                                  "aktif"   => "true",
                                  "create_on" => "walkin");  
            
            $prs_pemohon  = DB::table('perusahaan')->insert($perusahaan_array);
            $perusahaan_id = DB::getPdo()->lastInsertId();
        }
        else{
            
             $perusahaan_array = array( "status" => $perusahaan->status,
                                  "nama" => $perusahaan->nama,
                                  "email" => $perusahaan->email,
                                  "contact" => $perusahaan->hp,
                                  "alamat" => $perusahaan->alamat,
                                  "create_at" => $timestamp,
                                  "update_at" => $timestamp,
                                  "npwp" => $perusahaan->npwp,
                                  "aktif"   => "true",
                                  "create_on" => "walkin");  
            
           $prs_pemohon  = DB::table('perusahaan')
                            ->where('perusahaan_id',$perusahaan_id) 
                            ->update($perusahaan_array);  
        }
        
        
        /* INSERT / UPDATE PERUSAHAAN PENGURUS DATA */
        $pengurus_array = array( "nama" => $pengurus->nama,
                                 "email" => $pengurus->email,
                                 "contact" => $pengurus->hp,
                                 "create_at" => $timestamp,
                                 "update_at" => $timestamp,
                                 "perusahaan_id" => $perusahaan_id,
                                 "identitas_jenis"   => $pengurus->identitas_kategori,
                                 "identitas_no"   => $pengurus->identitas_no);
        
        
        if(empty($pengurus->perusahaanp_id)){
            $pgr_pemohon  = DB::table('perusahaan_pemohon')->insert($pengurus_array);
            $pengurus_id  = DB::getPdo()->lastInsertId(); 
        }
        else{
           $prs_pemohon  = DB::table('perusahaan_pemohon')
                            ->where('perusahaanp_id',$pengurus_id) 
                            ->update($pengurus_array);  
        }
        
        /* INSERT PERMOHONAN DATA */ 
        
        $code ='PRMN';
        $pegawaiCode = DB::table('permohonan')->where('permohonan_code', 'like', '%' . $code . '%')->max('permohonan_code');
        $idmax1 = $pegawaiCode;
        $nourut1 = (int) substr($idmax1, 4,5);
        $nourut1++;
        $permohonan_code = $code . sprintf("%05s", $nourut1);
    
        $IA_permohonan = array(
            'nama'   => $r->get('nama'),
            'perusahaan_id'     => $perusahaan_id,
            'perusahaanp_id'    => $pengurus_id,
            'opd_id'            => $opd->opd_id,
            'opdi_id'           => $opd->opdi_id,
            'create_at'         => $timestamp,
            'update_at'         => $timestamp,
            'status'            => "PROSESFO",
            'lokasi'            => $permohonan->lokasi,
            'catatan'           => $permohonan->catatan,
        );
        $i_permohonan  = DB::table('permohonan')->insert($IA_permohonan);
        
        
        
         /* INSERT PERSYARATAN DATA */ 
       foreach($persyaratan as $prs){
           $data =  json_decode($prs);
           
             $dataDetail = array(
                    'permohonan_id' => $permohonan_id,
                    'persyaratan'   => $data->syarat,
                    'opdp_id'       => $data->opdp_id,
                    'catatan'       => $data->keterangan,
                    'create_at'     => $timestamp,
                    'update_at'     => $timestamp,
                    'status'        => $data->status,
             );
           
            $insertDataP[] = $dataDetail;
          
        }
        DB::table('permohonan_persyaratan')->insert($insertDataP);
        
        return $permohonan_id;
    }
    function detail(Request $request){
        $permohonanId = $request->get('permohonanId');
        
        $permohonanModel = permohonanModel::with(['Getperusahaan','Getizin','Getopd','Getpersyaratan','Getpengurus'])
                                    ->where('permohonan_id',$permohonanId)
                                    ->get();

        
        foreach($permohonanModel as $a){
            $perusahaan_status = strtolower($a->getperusahaan->status);
            $icon =  null;
            
            
            
            if($perusahaan_status == 'perorangan'){
                $icon = "man-user.png";
                $perusahaanNama = strtoupper($a->getperusahaan->nama);
            }
            else{
               $icon = "office.png"; 
               $perusahaanNama = strtoupper($perusahaan_status).". ". ucwords(strtolower($a->getperusahaan->nama));
            }
            
            
            $b = array(
                "permohonan"  => $a,
                "icon" => $icon,
                "perusahaanNama" => $perusahaanNama,
            );
            
            $data[] = $b;
           
           
        }
        return $data;
        
    }
}
