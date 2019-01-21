@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('user.index') }}" class="btn btn-primary btn-lg">Back to Users</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Edit User</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control" :disabled="!auto_password">
                </div>
                <div class="form-group">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="auto_generate" v-model="auto_password">
                        Change Password?
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update User</button>
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
                    auto_password: false
                }
            });
        });
    </script>
@endsection