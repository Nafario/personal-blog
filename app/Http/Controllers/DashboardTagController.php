<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardTagController extends Controller
{
    public function index(){
        $tags = Tag::latest()->get();
        // $posts = Post::all();
        
        return view('dashboard.tag.index', compact('tags'));
    }
    
    public function create(){
        $tags = Tag::all();
        return view('dashboard.tag.create', compact('tags'));
    }
    public function store(Tag $tag){
        $newTag = request()->validate([
            'name' => ['required', 'max:255']
        ]);

        $tag->create($newTag);
        return redirect()->back()->with('msg', 'Successfully Created');
    }
}