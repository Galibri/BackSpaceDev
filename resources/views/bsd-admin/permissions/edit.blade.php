@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('permissions.index') }}" class="btn btn-primary btn-lg">Back to Permissions</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Edit Permission</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('permissions.update', $permission->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="display_name">Name (Display Name)</label>
                    <input type="text" name="display_name" id="display_name" value="{{ $permission->display_name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="name" id="slug" value="{{ $permission->name }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" value="{{ $permission->description }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Permission</button>
                </div>
            </form>
        </div>
    </div>

@endsection