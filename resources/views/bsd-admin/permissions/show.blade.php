@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('permissions.index') }}" class="btn btn-primary btn-lg">Back to Permissions</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Permissions Details</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Display Name: {{ $permission->display_name }}</h4>
                    <p class="card-text"><strong>Slug:</strong> {{ $permission->name }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $permission->description }}</p>
                </div>
            </div>            
        </div>
    </div>

@endsection