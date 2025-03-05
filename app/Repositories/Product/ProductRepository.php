<?php

namespace App\Repositories\Product;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Pagination\Paginator;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{
    public function index()
    {
        return Product::latest()->paginate(3);
    }

    public function find($id)
    {
        return Product::find($id);
    }
    public function create(ProductRequest $request)
    {
        $products = Product::create([


            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,

            'status' => $request->status == '1' ? true : false,
            'category_id' => $request->category_id




        ]);
        return $products;
    }
    // public function allproducts()
    // {
    //     return  Product::all();
    // }

    public function activeProducts()
    {
        return Product::where('status', 1)->paginate(10);

    }
}
