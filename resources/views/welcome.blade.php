@extends('layout.header')

@section('content')

<div class="row mt-5">
    <div class="col-md-3">
        <h5>Filter Vacancies</h5>
        <hr />
        <div class="mb-2">Keywords</div>

        <!-- filter box -->
        <form method="post" action="{{ url('filter_jobs') }}">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="search_for" class="form-control" placeholder="Job Title, Keyword..." aria-label="keyword-filter" aria-describedby="keyword-filter">
            </div>

            <!-- filter result button -->
            <button type="submit" class="btn btn-success btn-block mb-3">
                FILTER RESULTS
            </button>
        </form>
        

    </div>
    <div class="col-md-9">

        <!-- Flash message -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <!-- Mini header -->
        <div class="row mb-3 jobs-list-header">
            <div class="col-md-2">
                @if(isset($jobs))
                    Total jobs {{$total_jobs}}                
                @endif
               
            </div>
            <div class="col-md-10 text-right">
                <a class="btn pull-right btn-primary btn-sm add-btn" href="{{ url('post-job-form') }}">ADD NEW VACANCY</a>
            </div>
        </div>
        <!-- Display all jobs, no searcing yet -->
        @if(!isset($search_result))
            @if(isset($jobs))
                @if(count($jobs) > 0)
                    @foreach($jobs as $job)
                        <div class="col-md-12 job-container mb-4">
                            
                            <!-- Title -->
                            <h4><strong>{{ucfirst(trans($job->job_title))}}</strong></h4>

                            <!-- details -->
                            <div class="row">
                                <div class="col-md-2"><i class="fa fa-map-marker-alt"></i> {{ucfirst(trans($job->job_location))}}</div> 
                                <div class="col-md-2"><i class="fa fa-pound-sign"></i> {{$job->job_salary}}</div>
                                <div class="col-md-8 text-right"><small class="text-muted"><i class="fa fa-clock"></i> {{$job->created_at->diffForHumans()}}</small></div>
                            </div>
                            <hr/>
                            <!-- description -->
                            <p>
                                {{$job->job_description}}
                            </p>

                            <!-- action buttons -->
                            <button class="btn btn-sm">MORE DETAILS</button>
                            <button class="btn btn-sm">APPLY</button>

                        </div>
                    @endforeach

                    {{ $jobs->links() }}
                @else
                <div class="text-center">
                    <h4>No available Jobs to display</h4>
                </div>
            @endif
        @endif

        @else
            <!-- Search results -->
            @foreach($search_result as $result)
                <div class="col-md-12 job-container mb-4">
                    
                    <!-- Title -->
                    <h4><strong>{{$result->job_title}}</strong></h4>

                    <!-- details -->
                    <div>
                        <span><i class="fa fa-map-marker-alt"></i> {{$result->job_location}}</span> 
                        <span><i class="fa fa-pound-sign"></i> {{$result->job_salary}}</span>
                    </div>

                    <!-- description -->
                    <p>
                        {{$result->job_description}}
                    </p>

                    <!-- action buttons -->
                    <button class="btn btn-sm">MORE DETAILS</button>
                    <button class="btn btn-sm">APPLY</button>

                </div>
            @endforeach
       
        @endif

       

    </div>
</div>

@endsection