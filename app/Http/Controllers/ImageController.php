<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store (Request $request){
        $image = $request->file('file');

        $imageName = Str::uuid() . "." . $image->extension();

        $imageServidor = Image::make($image);
        $imageServidor -> fit(200,200);

        $imagePath = public_path('posts') . '/' . $imageName;
        $imageServidor->save($imagePath);

        return response()->json(['image' => $imageName]);
    }

    public function update(Product $id, Request $request){
        $image = $request->file('file');

        $imageName = Str::uuid() . "." . $image->extension();

        $imageServidor = Image::make($image);
        $imageServidor -> fit(200,200);

        $imagePath = public_path('posts') . '/' . $imageName;
        $imageServidor->save($imagePath);

        return response()->json(['image' => $imageName]);
    }

}
