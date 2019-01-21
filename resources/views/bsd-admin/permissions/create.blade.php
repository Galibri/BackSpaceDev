@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('permissions.index') }}" class="btn btn-primary btn-lg">Back to Permissions</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Create Permission</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('permissions.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="btn btn-primary active">
                        <input type="radio" name="permissiontype" v-model="permissionType" value="basic">
                        Basic Permission
                    </label>
                    <label class="btn btn-info">
                        <input type="radio" name="permissiontype" v-model="permissionType" value="crud" >
                        CRUD Permission
                    </label>
                </div>

                <div class="basic" v-if="permissionType == 'basic'">
                    <div class="form-group">
                        <label for="display_name">Name (Display Name)</label>
                        <input type="text" name="display_name" id="display_name" v-model="resource" value="{{ old('display_name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="name" id="slug" value="{{ old('name') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control">
                    </div>
                </div>
                <div class="crud" v-if="permissionType == 'crud'">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="resource">Resource Name</label>
                                <input type="text" name="resource" id="resource" v-model="resource" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="btn btn-primary active">
                                    <input type="checkbox" name="create" value="create" v-model="crudSelected"> Create
                                </label>
                                <label class="btn btn-primary">
                                    <input type="checkbox" name="read" value="read" v-model="crudSelected"> Read
                                </label>
                                <label class="btn btn-primary">
                                    <input type="checkbox" name="update" value="update" v-model="crudSelected"> Update
                                </label>
                                <label class="btn btn-primary">
                                    <input type="checkbox" name="delete" value="delete" v-model="crudSelected"> Delete
                                </label>
                            </div>
                            <input type="hidden" name="crud_selected" :value="crudSelected">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody v-if="resource.length >= 3">
                                    <tr v-for="item in crudSelected">
                                        <td v-text="crudName(item)"></td>
                                        <td v-text="crudSlug(item)"></td>
                                        <td v-text="crudDescription(item)"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Permission</button>
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
                    permissionType: 'basic',
                    resource: '',
                    crudSelected: ['create', 'read', 'update', 'delete']
                },
                methods: {
                    crudName: function(item) {
                        return item.substr(0, 1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1);
                    },
                    crudSlug: function(item) {
                        return item.toLowerCase() + "_" + app.resource.toLowerCase();
                    },
                    crudDescription: function(item) {
                        return "Allow a user to " + item.toUpperCase() + " " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1);
                    }
                }
            });
        });
    </script>
@endsection