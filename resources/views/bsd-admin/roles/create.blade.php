@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('roles.index') }}" class="btn btn-primary btn-lg">Back to Roles</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Create Role</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="display_name">Display Name</label>
                    <input type="text" name="display_name" id="display_name" value="{{ old('display_name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control">
                </div>
                <hr>
                <h3>Permissions:</h3>
                @foreach($permissions as $permission)
                    <div class="form-group">
                        <label class="btn btn-outline-default">
                            <input type="checkbox" value="{{ $permission->id }}" v-model.number="roles" checked autocomplete="off"> {{ $permission->display_name }} ({{ $permission->name }})
                        </label>
                    </div>
                @endforeach
                <input type="hidden" :value="roles" name="permission_ids">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create Role</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        window.addEventListener('load', function() {
            var app = new Vue({
                el: '#page-content-wrapper',
                data: {
                    roles: []
                }
            });
        });
    </script>
@endsection