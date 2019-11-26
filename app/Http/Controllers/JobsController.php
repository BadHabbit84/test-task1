<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs;

class JobsController extends Controller
{
    
	public function newJob() {

		return view('new-job');
	}




    public function save(Request $request) {

    	//prepare for saving
    	$job_title = $request->job_title;
    	$job_description = $request->job_description;
    	$job_location = $request->job_location;
    	$job_salary = $request->job_salary;

    	//some basic checks
    	//would be better do checks before submitting the form via JS
    	
    	//not the best checking option, but ok for now
    	if ($job_title == '' || $job_description == '' || $job_location == '') {
    		return redirect('post-job-form')->with('status', 'Please complete all the fields!');
    	}

    	if (!is_integer($job_salary)) {
    		return redirect('post-job-form')->with('status', 'Salary must be a Number');
    	}

    	$new_job = new Jobs;

    	$new_job->job_title = $job_title;
    	$new_job->job_description = $job_description;
    	$new_job->job_location = $job_location;
    	$new_job->job_salary = $job_salary;

    	$new_job->save();


    	return redirect('/')->with('status', 'Saved');
    	
    }
}
