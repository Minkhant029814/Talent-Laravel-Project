<?php

namespace App\Repositories\Category;

use PhpParser\Node\Expr\FuncCall;

interface CategoryRepositoryInterface
{
    public function index();
     public function find($id);
}
