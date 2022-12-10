<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Product;
use App\Models\Category;

class ProductoController extends Controller
{
    public function index(){
        $categories = Category::where('user_id', auth()->user()->id)->get();
        return view('registrar_producto', compact('categories'));
    }
    public function store(Request $request){

        $request->validate([
            'id' => 'required|unique:products|min:11|', //code product
            'name' => 'required|min:3',
            'price' => 'required',
            'brand' => 'required|min:3',
            'stock' => 'required',
            'image' => 'nullable',
            'category' => 'required'
        ]);
        //create instance
        $product = new Product();
        //asigned data
        $product->id = $request->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->brand = $request->brand;
        $product->stock = $request->stock;
        $product->image = $request->image;
        $product->user_id = auth()->user()->id;
        $product->category_id = $request->category;
        $product->save();

        return redirect()->route('home');
    }
    public function show($id){
        $product = Product::findOrFail($id);
        $categories = Category::where('user_id', auth()->user()->id)->get();
        return view('producto_detalle', compact('product', 'categories'));
    }
    
    public function cancel(){
        return redirect()->route('home');
    }

    public function filter_product(Request $request){
        $products = Product::where('category_id', $request->filter)->get();
        $categories = Category::where('user_id', auth()->user()->id)->get();
        return view('filter_products', compact('products', 'categories'));
    }

    public function search(Request $request){
        $search_result = Product::where('name', 'LIKE', "%{$request->search}%")->get();
        $categories = Category::where('user_id', auth()->user()->id)->get();

        if($search_result->isEmpty()){
            $search_result = Product::where('id', 'LIKE', "%{$request->search}%")->get();
            return view('search', compact('search_result', 'categories'));
        }
        return view('search', compact('search_result', 'categories'));

    }

    public function destroy(Product $id){
        $id->delete();
        return redirect()->route('home');
    }

    public function update(Product $id, Request $request){

        $id->name = $request->name;
        $id->price = $request->price;
        $id->brand = $request->brand;
        $id->stock = $request->stock;
        $id->image = $request->image;
        $id->user_id = auth()->user()->id;
        $id->category_id = $request->category;
        $id->save();
        return redirect()->route('producto.show', $id);
    }
    
}
