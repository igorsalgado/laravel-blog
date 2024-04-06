<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        dd(Post::all());

        return view('posts.index', compact('posts'));
    }

    public function show($post)
    {

        $post = Post::where('slug', $post)->firstOrFail();
        return view('posts.post', compact('post')); //['post' => $post] //php.net/compact
    }
}
