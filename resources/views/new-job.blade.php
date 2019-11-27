@extends('layout.header')

@section('content')

@if (session('status'))
    <div class="alert alert-danger mt-4">
        {{ session('status') }}
    </div>
@endif

<div class="mb-4 mt-3">
	
</div>
<div class="row">
<div class="col-md-7">
<form method="post" action="{{ url('/save_job') }}" id="form">

	@csrf
	<div class="">
		<h4>Please fill out the form</h4>
	</div>
	<hr />
	<div class="form-group">
		<label for="jobTitle">Job Title*</label>
    	<input type="text" name="job_title" class="form-control" id="jobTitle" aria-describedby="jobTitle" placeholder="Enter job title">
	</div>
	<div class="form-group">
		<label for="jobDescription">Job Description*</label>
    	<input type="text" name="job_description" class="form-control" id="jobDescription" aria-describedby="jobDescription" placeholder="Enter job description">
	</div>
	<div class="form-group">
		<label for="jobLocation">Job Location*</label>
    	<input type="text" name="job_location" class="form-control" id="jobLocation" aria-describedby="jobLocation" placeholder="Enter job location">
	</div>
	<label for="jobSalary">Job Salary*</label>
	<div class="row">
		<div class="form-group col-md-3">			
	    	<input type="text" name="salary_min" class="form-control" id="jobSalary" aria-describedby="jobSalary" placeholder="Minimum">
		</div>
		<div class="form-group col-md-1 text-center">&ndash;</div>
		<div class="form-group col-md-3">		
	    	<input type="text" name="salary_max" class="form-control" aria-describedby="jobSalary" placeholder="Maximum">
		</div>
	</div>
	<div class="row">
		<div class="col-md-1">
    		<a class="btn btn-default btn-sm" href="{{url('/')}}"><i class="fa fa-chevron-left"></i> back</a>
    	</div>
    	<div class="col-md-11 text-right">
    		<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane"></i> SUBMIT JOB</button>
    	</div>
	</div>
</form>
</div>
<div class="col-md-4 text-right">
	<div class="post-job-sidebar">
		<div>All fields marked with * are mandatory</div>
		<div>Some more useful information</div>
		<div>Some more useful information</div>
		<div>Some more useful information</div>
	</div>
</div>
</div>
@endsection