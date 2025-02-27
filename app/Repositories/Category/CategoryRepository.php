<?php
namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
class CategoryRepository implements CategoryRepositoryInterface
{
    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    public function find($id)
    {
        $categories = Category::find($id);
        return $categories;
    }
};

