<?php


namespace App\Repositories\Image;

use App\Models\Image;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

interface ImageRepositoryInterface {
    public function index();
    public function create();
    public function find($id);
    public function save(Request $request);
    public function destroy(Image $image);

};
