@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg">Back to Posts</a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12">
            <h2 class="title">Edit Post</h2>
            <hr>
        </div>
    </div>
    <form action="{{ route('posts.update', $post->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control" placeholder="Title...">
                </div>
                <slug-widget url="{{url('/')}}/" :title="title" @slug-changed="updateSlug" :has_slug="slug" api_token="{{ auth()->user()->api_token }}"></slug-widget>
                <input type="hidden" :value="slug" name="slug">
                <div class="form-group">
                <textarea name="content" class="form-control" id="tinycontent" cols="30" rows="20" placeholder="Type your content...">{{ $post->content }}</textarea>
                </div>   
            </div>
            <div class="col-md-3">
                <div class="card mb-2">
                    <div class="card-header">
                        <strong>Action</strong>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><i class="fa fa-book"></i> <span class="draft">{{ $post->status == 0 ? 'Draft': 'Published' }}</span></p>
                        <p class="card-text">{{ $post->updated_at->diffForHumans() }}</p>
                        <div class="form-group">
                            <button type="submit" name="draft" class="btn btn-outline-dark btn-light">Draft</button>
                            <button type="submit" name="save" class="btn btn-primary">Publish Post</button>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header">
                    <strong>Category</strong>
                    </div>
                    <div class="card-body">
                        <div class="post-categories">
                            @foreach($allCategories as $category)
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="{{ $category->id }}" v-model="post_categories">
                                    {{ $category->name }}
                                  </label>
                                </div>
                            @endforeach
                            <input type="hidden" :value="post_categories" name="post_cats">
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header">
                    <strong>Author</strong>
                    </div>
                    <div class="card-body">
                        <select name="post_author" class="form-control" v-model="author_name">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        window.addEventListener('load', function() {
            var app = new Vue({
                el: '#page-content-wrapper',
                data: {
                    title: '',
                    slug: '{{ $post->slug }}',
                    post_categories: {{ $post->categories->pluck('id') }},
                    author_name: '{{ $post->user_id }}',
                },
                methods: {
                    updateSlug: function(val) {
                        this.slug = val;
                    }
                }
            });
            // TinyMce Editor
            CKEDITOR.replace( 'tinycontent' );
        });
    </script>
@endsection