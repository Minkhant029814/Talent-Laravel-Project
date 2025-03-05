<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\updateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\Products\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $productStatus;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository, ProductService $productService)
    {
        $this->middleware('auth');
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productStatus = $productService;
    }




    public function index()
    {
        if (!Auth::check() || Auth::user()->roles->pluck('name')->contains('guest')) {

            $products = $this->productRepository->activeProducts();
        } elseif (Auth::user()->roles->pluck('name')->contains('admin')) {

            $products = $this->productRepository->index();
        } else {

            $products = $this->productRepository->index();
        }

        return view('products.productIndex', compact('products'));
    }

    public function show($id)
    {

        $products = $this->productRepository->find($id);

        return view('products.productDetail', compact('products'));
    }
    public function create()
    {
        $categories = $this->categoryRepository->index();

        return view('products.productCreate', compact('categories'));
    }
    public function saveProduct(ProductRequest $request)
    {

        $data = $this->productRepository->create($request);

        return redirect()->route('product.Index');
    }
    public function delete($id)
    {

        $product = $this->productRepository->find($id);
        $product->delete();
        return redirect()->route('product.Index');
    }

    public function edit($id)
    {

        $categories = $this->categoryRepository->index();

        $product = Product::with('category')->where('id', $id)->first();

        return view('products.productEdit', compact('product', 'categories'));
    }
    public function update(updateRequest $request)
    {

        $product = $this->productRepository->find($request->id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->has('status') ? true : false,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('product.Index');
    }

    public function status($id)
    {
        $this->productStatus->show($id);
        return redirect()->route('product.Index');
    }
}
