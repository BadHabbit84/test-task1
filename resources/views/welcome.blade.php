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
            reults total 10...
        </div>

        
    </div>
</div>

@endsection