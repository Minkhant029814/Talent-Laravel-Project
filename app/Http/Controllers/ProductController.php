<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\updateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }




    public Function index(){
        // $products = Product::latest()->paginate(3 );
        $products = $this->productRepository->index();

        return view('products.productIndex',compact('products'));
}

public function show($id){
    // $products = Product::find($id);
    $products = $this ->productRepository->find($id);
    //dd($products);
    return view('products.productDetail',compact('products'));
}
public function create(){
    $categories = $this->categoryRepository->index();
    //  $categories = Category::all();
    //dd($categories);
    return view('products.productCreate',compact('categories'));
}
public function saveProduct(ProductRequest $request){
   //dd($request->all());
        $data = $this->productRepository->create($request);

        return redirect()->route('product.Index');
}
public function delete($id){
    // $product = Product::find($id);
    $product = $this->productRepository->index();
    $product->delete();
    return redirect()->route('product.Index');
}

public function edit($id){
    // $categories = Category::get();
    $categories = $this ->categoryRepository->index();

    $product = Product::with('category')->where('id',$id)->first();
    //dd($product);
    return view('products.productEdit',compact('product','categories'));
}
public function update(updateRequest $request){
    // $product = Product::find($request->id);
    $product = $this->productRepository->find($request->id);
    $product->update([
        'name'=>$request->name,
        'description'=>$request->description,
        'price'=>$request->price,
        'status' => $request->has('status') ? true : false,
        'category_id'=>$request->category_id
    ]);
    return redirect()->route('product.Index');

        }
}
