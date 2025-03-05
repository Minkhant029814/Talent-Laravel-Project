<?php

namespace App\Repositories\Image;

use App\Models\Image;
use App\Models\Product;
use  App\Repositories\Image\ImageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageRepository implements ImageRepositoryInterface{
    public  function index()
    {
        $products = Product::with('image')->get();
        return view('Image.index',compact('products'));
    }

    public function create()
    {
        $products = Product::all();
        return view('Image.create',compact('products'));
    }

    public function save(Request $request)
    {
        if($request->hasFile('files')){
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('uploads','public');
                Image::create([
                    'product_id'=>$request->product_id,
                    'name'=>$file->getClientOriginalName(),
                    'path'=>$filePath
                ]);
            }
        }
    }

    public function find($id)
    {
        return Product::with('image')->findOrFail($id);
    }
    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->path);
        return   $image ->delete();
    }


}
