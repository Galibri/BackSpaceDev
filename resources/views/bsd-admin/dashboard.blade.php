@extends('layouts.admin')

@section('content')
    <div class="row dashboard-row">
        <div class="col-md-12">
            <h3 class="text-center dashboard-heading">Earnings history</h3>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-orange card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">{{ date('F') }} earnings</h5>
                    <p class="card-text"><span>$</span> {{ $earned_this_month }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-purple card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">{{ date('Y') }} earnings</h5>
                    <p class="card-text"><span>$</span> {{ $earned_this_year }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-danger card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">Lifetime Earnings</h5>
                    <p class="card-text"><span>$</span> {{ $earned_lifetime }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-secondary card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">Upcoming earnings</h5>
                    <p class="card-text"><span>$</span> {{ $upcoming_earning }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 dashboard-row">
        <div class="col-md-12 mt-2">
            <h3 class="text-center dashboard-heading">Projects history</h3>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-info card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">In {{ date('F') }}</h5>
                    <p class="card-text">{{ $completed_projects_this_month }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-success card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">In {{ date('Y') }}</h5>
                    <p class="card-text">{{ $completed_projects_this_year }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-cyan card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">Lifetime</h5>
                    <p class="card-text">{{ $completed_projects_lifetime }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center text-white bg-grey card-shadow dashboard-cards">
                <div class="card-body">
                    <h5 class="card-title">Upcoming</h5>
                    <p class="card-text">{{ $processing_projects }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection