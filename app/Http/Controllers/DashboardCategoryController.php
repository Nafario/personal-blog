<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

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
        return redirect(route('admin-category'))->with('msg', 'Successfully Created');
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('dashboard.category.edit', compact('category'));
    }
    public function update($id){
        // dd(request()->all());
        $category = Category::findOrFail($id);
        $value = request()->validate([
            'name' => ['max:255', 'string']
        ]);
        
        $category->update($value);
        // dd($updateTag);
        return redirect(route('admin-category'))->with('msg', 'Successfully Updated');
    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect(route('admin-category'))->with('delete', 'Successfully Deleted');

    }
}