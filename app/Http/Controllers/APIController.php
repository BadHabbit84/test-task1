<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs;

class APIController extends Controller
{
    public function recentJobs() {

    	$x = Jobs::all();

    	return json_encode($x);
    }
}
