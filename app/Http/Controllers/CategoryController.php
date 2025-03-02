<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index(){

        $data = $this->categoryRepository->index();

        return view("categories.index",compact('data'));

    }


    public function show($id){

        $category = $this->categoryRepository->find($id);

        return view('categories.show', compact('category'));
    }

    public function create(){

        return  view('categories.create');
    }

    public function store(Request $request){
        Category::create([
            'name'=>$request->name
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id){
        $category = $this->categoryRepository->find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }

    public function edit($id){

        $category = $this->categoryRepository->find($id);
        return view('categories.edite',compact('category'));
    }

    public function update(Request $request){
        $category = $this->categoryRepository->find($request);
        $category ->update([
            'name'=>$request->name
        ]);
        return redirect()->route('categories.index');
    }
}
