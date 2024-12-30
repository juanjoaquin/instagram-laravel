<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke( Post $post)
    {

        $ids = auth()->user()->following->pluck('id')->toArray();
        $post = Post::whereIn('user_id', $ids)->get();

        return view('home' , ['posts' => $post]);
    }
}
