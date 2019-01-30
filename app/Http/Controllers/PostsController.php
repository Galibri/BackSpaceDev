<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator|administrator|editor|author|contributor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('bsd-admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('bsd-admin.posts.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
        ]);

        if ($request->has('draft')) {
            $post = new Post();
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->user_id = $request->post_author;
            $post->status = 0;
            $post->save();

            $categories = explode(',', $request->post_cats);
            $post->categories()->sync($categories);
        } elseif ($request->has('save')) {
            $post = new Post();
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->user_id = $request->post_author;
            $post->status = 1;
            $post->save();

            $categories = explode(',', $request->post_cats);
            $post->categories()->sync($categories);
        }
        return redirect()->route('posts.edit', $post->id)->with('success', 'Post saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allCategories = Category::all();
        $users = User::all();
        $post = Post::whereId($id)->with('categories')->first();
        return view('bsd-admin.posts.edit', compact('allCategories', 'users', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
        ]);

        if ($request->has('draft')) {
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->user_id = $request->post_author;
            $post->status = 0;
            $post->save();

            $categories = explode(',', $request->post_cats);
            $post->categories()->sync($categories);
        } elseif ($request->has('save')) {
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->user_id = $request->post_author;
            $post->status = 1;
            $post->save();

            $categories = explode(',', $request->post_cats);
            $post->categories()->sync($categories);
        }
        return redirect()->route('posts.edit', $post->id)->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->categories()->detach();
        $post->delete();
        return redirect()->back()->with('success', 'Post Deleted Successfully.');
    }

    public function apiCheckUnique(Request $request) {
        return json_encode(!Post::where('slug', '=', $request->slug)->exists());
    }
}
