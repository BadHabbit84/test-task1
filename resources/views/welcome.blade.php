@extends('layout.header')

@section('content')

<div class="row">
    <div class="col-md-3" style="background-color: red">
        <h4>Filter Vacancies</h4>
        <hr />
        <div class="mb-2">Keywords</div>

        <!-- filter box -->
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Job Title, Keyword..." aria-label="keyword-filter" aria-describedby="keyword-filter">
        </div>

        <!-- filter result button -->
        <button class="btn btn-success btn-block mb-3">
            FILTER RESULTS
        </button>

    </div>
    <div class="col-md-9" style="background-color: green">
        <div class="col-md-12">
           @if(count($jobs) > 0)
                Total jobs {{count($jobs)}}
           @endif
        </div>

        @foreach($jobs as $job)
            <div class="col-md-12 job-container mb-3">
                
                <!-- Title -->
                <h4><strong>{{$job->job_title}}</strong></h4>

                <!-- details -->
                <div>
                    <span><i class="fa fa-map-marker-alt"></i> {{$job->job_location}}</span> 
                    <span><i class="fa fa-pound-sign"></i> {{$job->job_salary}}</span>
                </div>

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


    </div>
</div>

@endsection