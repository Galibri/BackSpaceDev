@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('user.create') }}" class="btn btn-primary btn-lg">Add New User</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Users</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped dataTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="post" class="d-inline">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection