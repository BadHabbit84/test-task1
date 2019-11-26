<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Jobs;

class HomeController extends Controller
{
    public function index(Request $Request) {


    	// get all available jobs
    	$total_jobs_array = Jobs::all();
    	//have to count before pagination
    	$total_jobs = count($total_jobs_array);
    	
    	$jobs = Jobs::orderBy('id', 'DESC')
    					->paginate(2);
    					
    	
    	if (count($jobs) > 0) {   		
    		
    		return view('welcome', compact('jobs', 'total_jobs'));
    	}

    	//fallback
    	$jobs = array();
    	return view('welcome', compact('jobs', 'total_jobs'));
    	
    }


}
