<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Jobs;

class HomeController extends Controller
{
    public function index(Request $Request) {


    	// get all available jobs
    	$jobs = Jobs::paginate(2);    
//var_dump($jobs);exit;
    	
    	if (count($jobs) > 0) {
    		return view('welcome', compact('jobs'));
    	}

    	//fallback
    	$jobs = array();
    	return view('welcome', compact('jobs'));
    	
    }
}
