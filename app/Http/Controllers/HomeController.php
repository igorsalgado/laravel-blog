<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function show($post){

        $post = Post::where('slug', $post)->first();
        return view('posts.post', compact('post')); //['post' => $post] //php.net/compact
    }
}
