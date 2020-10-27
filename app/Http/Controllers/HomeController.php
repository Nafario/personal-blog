<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $exclusivePost = Post::take(4)->latest()->get();
        $featuredPost = Post::take(2)->latest()->get();
        $newPost = Post::take(1)->latest()->get();
        $posts = Post::latest()->paginate(8);
        $user = auth()->user();
        $categories = Category::latest()->get();
        // $tags = Tag::latest()->get();
        return view('home.index', compact('posts', 'newPost' ,'featuredPost', 'exclusivePost', 'user','categories'));
    }
}