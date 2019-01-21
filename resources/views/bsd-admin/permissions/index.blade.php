@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-lg">Add New Permission</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Permissions</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped dataTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->display_name }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->description }}</td>
                            <td>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection