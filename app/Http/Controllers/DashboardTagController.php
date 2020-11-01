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
    public function store(){
        $validate = request()->validate([
            'name' => ['required', 'max:255', 'string']
        ]);
        Tag::create($validate);
        return redirect(route('admin-tag'))->with('msg', 'Successfully Created');
    }
    public function edit($id){
        $tag = Tag::findOrFail($id);
        return view('dashboard.tag.edit', compact('tag'));
    }
    public function update($id){
        // dd(request()->all());
        $tag = Tag::findOrFail($id);
        $value = request()->validate([
            'name' => ['max:255', 'string']
        ]);
        
        $tag->update($value);
        // dd($updateTag);
        return redirect(route('admin-tag'))->with('msg', 'Successfully Updated');
    }
    public function destroy($id){
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect(route('admin-tag'))->with('delete', 'Successfully Deleted');

    }
}