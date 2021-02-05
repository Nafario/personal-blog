<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $newPost = Post::latest()->paginate(4);
        $featuredPost = Post::take(2)
            ->latest()
            ->get();
        $user = User::first();
        $categories = Category::latest()->get();
        // dd($userPost);
        return view(
            'post.index',
            compact('posts', 'newPost', 'featuredPost', 'user', 'categories')
        );
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $featuredPost = Post::take(2)
            ->latest()
            ->get();
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        // dd($user);
        return view(
            'post.show',
            compact('post', 'featuredPost', 'categories', 'tags')
        );
    }
}
