<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Team;
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


    public function all_post()
    {
        $posts = Post::all();
        return view('backend.posts.all_posts' , compact('posts'));
    }

    public function create(){
        $teams = Team::all();
        return view('backend.posts.add_post' , compact('teams'));
    }

    public function store(StorePostRequest $request)
    {
        $title = $request->title;
        $date = $request->date;
        $desc = $request->desc;
        $team_id = $request->team_id;
        $image_post = $request->file('image');


        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($image_post->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'frontend/images/'; 
        $image = $img_name; 
        $image_post->move($upload_location,$img_name); 

        $post = Post::create([
            'title' => $title,
            'date' => $date,
            'desc' => $desc,
            'image' => $image,
            'team_id' => $team_id,
        ]);

        return redirect()->route('dashboard.posts.all_post')->with('message' , 'the post is added successfully');
    }


    public function edit( $id)
    {
        $post = Post::find($id);
        $teams = Team::all();

        return view('backend.posts.edit_post' , compact('post' , 'teams'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::find($id);
        $title = $request->title;
        $date = $request->date;
        $desc = $request->desc;
        $team_id = $request->team_id;
        $image_post = $request->file('image');


        $name_gen = hexdec(uniqid()); 
        $img_ext = strtolower($image_post->getClientOriginalExtension()); 
        $img_name = $name_gen . '.' . $img_ext; 
         
        $upload_location = 'frontend/images/'; 
        $image = $img_name; 
        $image_post->move($upload_location,$img_name); 

        $post->update([
            'title' => $title,
            'date' => $date,
            'desc' => $desc,
            'image' => $image,
            'team_id' => $team_id,
        ]);

        return redirect()->route('dashboard.posts.all_post')->with('message' , 'the post is updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('dashboard.posts.all_post')->with('message' , 'the post is deleted successfully');

    }
}
