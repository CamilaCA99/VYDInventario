<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriaController extends Controller
{
    public function index(){
        $categories = Category::where('user_id', auth()->user()->id)->get();
        return view('categorias', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:4|unique:categories'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->user_id = auth()->user()->id;
        $category->save();

        return redirect()->route('categoria');
    }

    public function destroy(Category $id){
        $id->delete();
        return redirect()->route('categoria');

    }
}
