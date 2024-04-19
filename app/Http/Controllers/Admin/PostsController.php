<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class PostsController extends Controller
{
    public function __construct(private Post $post)
    {
    }

    public function index()
    {
        $posts = $this->post->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create(User $user)
    {
        $users = $user->all(['id', 'name']);
        return view('admin.posts.create', compact('users'));
    }

    public function store(PostRequest $request, User $user)
    {
        // Active Record
        // $post = new Post();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->body = $request->body;
        // $post->is_active = $request->is_active;
        // $post->slug = Str::slug($request->title);

        // $post->save();

        $data = $request->all();
        $data['slug'] = Str::slug($data['title']); //melhorado com http://laravel.com/docs/10.x/eloquent-mutators
        $data['thumb'] = $request->thumb?->store('posts', 'public');

        // $user = auth()->user(); //model User populado com os dados do user autenticado
        $user = $user->find($request->user);
        $user->posts()->create($data); //array associativo pegando name do input para fazer o match coluna = valor

        return redirect()->route('admin.posts.index');
    }

    public function edit($post)
    {
        $post = $this->post->findOrFail($post);

        return view('admin.posts.edit', compact('post'));
    }

    public function update($post, PostRequest $request)
    {
        $post = $this->post->findOrFail($post);

        if ($request->thumb) {
            if ($post->thumb) Storage::disk('public')->delete($post->thumb);

            $data['thumb'] = $request->thumb?->store('posts', 'public');
        }

        $post->update($request->all());

        return redirect()->route('admin.posts.edit', $post->id);
    }

    public function destroy($post)
    {
        $post = $this->post->findOrFail($post);
        $post->delete();

        return redirect()->back();
    }
}
