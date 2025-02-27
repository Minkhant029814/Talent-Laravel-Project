<?php

namespace App\Repositories\Product;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{
    public function index()
    {
        $products = Product::latest()->paginate(3);
        return $products;
    }

    public function find($id)
    {
        $products = Product::find($id);
        return $products;
    }
    public function create(ProductRequest $request)
    {
            $products = Product::create([


                        'name'=>$request->name,
                        'description'=>$request->description,
                        'price'=>$request->price,
                        'image'=>$request->file('image')->store('uploads','public'),
                        'status'=>$request->status == '1' ? true:false,
                        'category_id'=>$request->category_id




            ]);
            return $products;
    }

}
