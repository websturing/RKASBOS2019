<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class appControl extends Controller
{
    function masterLimitles(){
        return view('MasterSJ1');
    }
    function login(){
        return view('login/login');
    }
    function submit(Request $request){
        $username = $request->get('username');
        $password = md5($request->get('password'));
        
        $data = DB::table('users')
                        ->where('username', $username)
                        ->where('password', $password)
                        ->count();
        
        if($data > 0){
            Session::put('login',TRUE);
            Session::put('username',$username);
            
            $r = "dashboard";
        }
        else{
            $r = 0;
        }
        
        $return = array('check' => $data,
                        'return' => $r);
                        
        return $return;
        
    }
}
