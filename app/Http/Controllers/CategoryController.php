<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id){
        $user = User::first();
        $featuredPost = Post::take(2)->latest()->get();
        $category = Category::findOrFail($id);
        $categoryPosts = Post::where('category_id', $id)->paginate(6);
        $categories = Category::latest()->get();
        return view('category.show', compact('categories','user','featuredPost', 'categoryPosts', 'category'));
    }
}