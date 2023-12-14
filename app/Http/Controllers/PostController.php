<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{

    public function all_posts_api()
    {
        $posts = Post::all();
        return response()->json($posts, 200);
    }

    public function single_post_api($id)
    {
        $posts = Post::find($id);
        return response()->json($posts, 200);
    }

    public function single_post($id)
    {
        $posts = Post::find($id);
        return view('frontend.single_post' , compact('posts'));
    }


    public function create()
    {
        //
    }

    public function store(StorePostRequest $request)
    {
        //
    }


    public function edit(Post $post)
    {
        //
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
