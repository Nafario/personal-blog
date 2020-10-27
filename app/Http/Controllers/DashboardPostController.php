<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        // dd($category->name);
        return view('dashboard.posts.index', compact('posts', 'categories', 'tags'));
    }
    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.posts.create', compact('categories', 'tags'));
    }
    public function store(Post $post){
        // dd(request()->all());
        $newPost = request()->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required','max:2000'],
            'thumbnail' => ['required', 'image', 'file'],
            'category_id' => ['required', 'max:255', 'alpha_dash'],
            'tags' => ['required']
        ]);
        if (request()->hasFile('thumbnail')) {
            $thumbnail = request()->file('thumbnail')->getClientOriginalName();
            $newPost['thumbnail'] = request()->file('thumbnail')->storeAs('thumbnails', $thumbnail, 'public');
            $post->update($newPost);
        }
        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $newPost['title'],
            'body' => $newPost['body'],
            'thumbnail' => $newPost['thumbnail'],
            'category_id' => $newPost['category_id'],
        ]);
        // dd($post);
        $post->tags()->attach(request('tags'));
        return redirect()->back()->with('msg', 'Successfully Uploaded');

    }
}