@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-lg">Back to Users</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">User Details</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Name: {{ $user->name }}</h4>
                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                    <p class="card-text"><strong>Registered:</strong> {{ $user->created_at->format('Y-m-d') }}</p>
                </div>
            </div>            
        </div>
    </div>

@endsection