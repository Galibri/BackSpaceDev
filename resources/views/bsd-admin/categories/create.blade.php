@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('categories.index') }}" class="btn btn-primary btn-lg">Back to Categories</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Create Category</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" v-model="slug" class="form-control">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" :value="createSlug"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" value="{{ old('description') }}"  class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Category</button>
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
                    slug: ''
                },
                computed: {
                    createSlug: function() {
                        return this.slug.replace(/\s+/g, '-').toLowerCase();
                    }
                }
            });
        });
    </script>
@endsection