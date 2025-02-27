<?php

namespace App\Repositories\Product;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

interface ProductRepositoryInterface {
        public function index();
        public function find($id);
        public function create(ProductRequest  $data);
}
