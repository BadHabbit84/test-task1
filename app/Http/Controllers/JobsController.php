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
    	$salary_min = $request->salary_min;
    	$salary_max = $request->salary_max;

    	//some basic checks
    	//would be better do checks before submitting the form via JS
    	
    	//not the best checking option, but ok for now
    	if ($job_title == '' || $job_description == '' || $job_location == '') {
    		return redirect('post-job-form')->with('status', 'Please complete all the fields!');
    	}

    	if (!ctype_digit($salary_min) || !ctype_digit($salary_max)) {
    		return redirect('post-job-form')->with('status', 'Salary must be a Number');
    	}

    	$new_job = new Jobs;

    	$new_job->job_title = $job_title;
    	$new_job->job_description = $job_description;
    	$new_job->job_location = $job_location;
    	$new_job->salary_min = $salary_min;
    	$new_job->salary_max = $salary_max;

    	$new_job->save();


    	return redirect('/')->with('status', 'Saved');
    	
    }

    public function filterJobs(Request $request) {

    	$search_for = $request->search_for;

    	$search_result = array();

    	$total_jobs_array = Jobs::all();
	    //have to count before pagination
	    $total_jobs = count($total_jobs_array);    

    	if ($search_for) {

    		$search_filter_like = '%'.$search_for.'%';
    		$search_filter_equal = $search_for;
    		
    		$search_result = Jobs::where(function($query) use ($search_filter_like, $search_filter_equal) {
    						$query->where('job_title', 'LIKE', $search_filter_like)
	    						->orWhere('job_description', 'LIKE', $search_filter_like)
	    						->orWhere('job_location', 'LIKE', $search_filter_like);
    						})
    						->orderBy('id', 'DESC')
    						->get();

    		//if searched show available jobs based on search result 
    		$total_jobs = count($search_result);

    		return view('welcome', compact('search_result', 'total_jobs'));
    	}
    	else {

    		//fallback    		
    		$jobs = Jobs::orderBy('id', 'DESC')
    					->paginate(2);


    		return view('welcome', compact('jobs', 'total_jobs'));
    	}

    	
    }































}
