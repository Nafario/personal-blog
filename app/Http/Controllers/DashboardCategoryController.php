<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardCategoryController extends Controller
{

    public function index(){
        $categories = Category::latest()->get();
        return view('dashboard.category.index', compact('categories'));
    }
    
    public function create(){
        $category = Category::all();
        return view('dashboard.category.create', compact('category'));
    }
    public function store(Category $category){
        $newCategory = request()->validate([
            'name' => ['required', 'max:255', 'alpha_dash']
        ]);

        $category->create($newCategory);
        return redirect()->back()->with('msg', 'Successfully Created');
    }
}