<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use App\model\permohonanModel;
use App\model\perusahaanModel;
use App\model\opdIzinModel;
use App\model\opdModel;
use DB;
use PDF;
use Session;

class izinControl extends Controller
{
   function list(){
       $izinlist = opdIzinModel::with('opd')->get(); 
       return $izinlist;
   }
   function DFRIzin(Request $request){
       
        $headerPage = $request->get("q");
        $Searching = $request->get("data");
       
        
       
        $perizinan = opdIzinModel::where('kategori','perizinan')->count();
        $nonperizinan = opdIzinModel::where('kategori','nonperizinan')->count();
       
        if($headerPage == 'searching' && $Searching != ''){
            $list =  opdIzinModel::with('opd')
                        ->where('nama_izin', 'like', '%' . $Searching . '%')
                        ->orderBy('nama_izin','ASC')
                        ->get();
        }
       else{
           $list = opdIzinModel::with('opd')
                        ->orderBy('nama_izin','ASC')
                        ->get();
       }
       
       
       
       $data  = $list;
       $listCount = array(
                "perizinan" => $perizinan,
                "nonperizinan" => $nonperizinan
            );

       
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
       
       
       $return = array("izin" => $paginatedItems, "jumlah" => $listCount);
       
       return $return;
   }
    
   function pdfIzin(Request $request){
        $opdi_id = $request->get("_V");
       
        $date = date("Y-m-d H:i:s");
        
        $dateCrypte = crypt::encryptString($date);  
        $substrDate =  substr($dateCrypte,0,8);
        $persyaratan = opdIzinModel::with(['opd','persyaratan'])
                                ->where('opdi_id',$opdi_id)
                                ->get();
       
        $pdf = PDF::loadView('limitless/persyaratan/pdf_persyaratan', compact('persyaratan','date','substrDate'))->setPaper('a4', 'potrait');;
        return $pdf->stream("persyaratan.pdf"); 
   }
}
