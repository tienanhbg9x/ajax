<?php

namespace App\Http\Controllers;


use App\Post;

use App\Channel;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }
    public function create()
    {
        return view('channel.create');
    }
}
