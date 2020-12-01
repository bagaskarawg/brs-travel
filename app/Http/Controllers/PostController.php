<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $users = User::admin()->get();

        return view('posts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required'],
            'body' => ['required'],
            'published_at' => ['nullable']
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);

        Post::create($attributes);

        $request->session()->flash('success', 'Berhasil menambahkan post.');
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        $users = User::admin()->get();

        return view('posts.edit', compact('post', 'users'));
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $this->validate($request, [
            'user_id' => ['required', 'exists:users,id'],
            'title' => ['required'],
            'body' => ['required'],
            'published_at' => ['nullable']
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);

        $post->update($attributes);

        $request->session()->flash('success', 'Berhasil memperbarui post.');
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
