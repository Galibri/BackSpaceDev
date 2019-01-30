@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('categories.index') }}" class="btn btn-primary btn-lg">Back to Categories</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Category Details</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><strong>Name:</strong> {{ $category->name }}</h4>
                    <p class="card-text"><strong>Slug:</strong> {{ $category->slug }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $category->description }}</p>
                </div>
            </div>            
        </div>
    </div>

@endsection