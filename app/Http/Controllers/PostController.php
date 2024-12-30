<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index(User $user)
    {
        // $posts = Post::where('user_id', $user->id)->get();
        $posts = Post::where('user_id', $user->id)->paginate(5);
        
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100|min:1',
            'description' => 'required|max:255|min:3',
            'imagen' => 'required'
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

                // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);



        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        //Elimiando de uploads
        $imagen_path = public_path('uploads/' . $post->imagen);
        if(File::exists($imagen_path)) {
            unlink($imagen_path);
            
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }


}
