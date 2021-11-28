<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginMethod(){
        return view('auth.login');
    }
    
    public function index(){
        $abc = "ggggg";

        var_dump("halo  -  ", $abc);
        
        return view('welcome');
    }
    
    public function halo(){
    	return view ('halo');
    }

    public function lisa(){
    	return view ('coba');
    }
}
