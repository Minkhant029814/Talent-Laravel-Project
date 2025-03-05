<?php
namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
class CategoryRepository implements CategoryRepositoryInterface
{
    public function index()
    {
        return Category::all();

    }

    public function find($id)
    {
        return Category::find($id);

    }
};

