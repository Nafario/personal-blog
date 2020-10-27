<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($id){
        // $tags = Tag::latest()->get();
        // dd($id);
        $tags = Tag::findOrFail($id);
        $tagPosts = $tags->posts;
        $user = auth()->user();
        $featuredPost = Post::take(2)->latest()->get();
        $categories = Category::latest()->get();
        return view('tag.show', compact('tags', 'user', 'categories', 'featuredPost'));
    }
}