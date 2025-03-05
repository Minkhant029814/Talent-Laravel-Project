<?php


namespace App\Services\Images;

use App\Models\Image;
use App\Repositories\Image\ImageRepository;
use Illuminate\Http\Request;

class ImageService {
    protected $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function index(){
     return   $this->imageRepository->index();
    }
    public function create(){
        return $this->imageRepository->create();
    }
    public function imageStore(Request $request){
      return $this->imageRepository->save($request);
    }

    public function find($id){
        return $this->imageRepository->find($id);
    }
    public function destroy(Image $image){
       return $this->imageRepository->destroy($image);
    }
};
