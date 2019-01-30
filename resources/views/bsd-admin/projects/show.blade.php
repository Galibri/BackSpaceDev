@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('roles.index') }}" class="btn btn-primary btn-lg">Back to Roles</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Role Details</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Name: {{ $role->display_name }}</h4>
                    <p class="card-text"><strong>Role:</strong> {{ $role->name }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $role->description }}</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Permissions</h3>
                    <ul>
                    @foreach($role->permissions as $r)
                        <li>{{ $r->display_name }} ({{ $r->name }})</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection