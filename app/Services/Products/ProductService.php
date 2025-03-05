<?php

namespace App\Services\Products;

use App\Repositories\Product\ProductRepositoryInterface;

class ProductService {
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function show($id){
        $product =  $this->productRepository->find($id);
        $product->status = $product->status == 1 ? 0 : 1;
        $product->save();
    }
};
