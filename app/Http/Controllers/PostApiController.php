<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'desc')->get();
        return $posts;
    }

    public function show($post_id){
        $post = Post::find($post_id);
        return $post;
    }

    public function store(StorePostRequest $request){
        $post = new Post;
        $post->fill($request->all())->save();

        return $post;
    }

    public function update(StorePostRequest $request, $post_id){
        $post = Post::findOrFail($post_id);
        $post->fill($request->all())->save();
        return $post;
    }

    public function destroy($post_id){
        $post = Post::findOrFail($post_id);
        $post->delete();

        $posts = Post::orderBy('id', 'desc')->get();
        return $posts;
    }
}
