<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use App\model\permohonanModel;
use App\model\perusahaanModel;
use App\model\opdIzinModel;


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
}
