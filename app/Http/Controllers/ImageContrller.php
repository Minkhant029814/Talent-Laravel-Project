<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Services\Images\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageContrller extends Controller
{

    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->imageService->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->imageService->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->imageService->imageStore($request);
        return redirect()->route('images.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product =  $this->imageService->find($id);
        return view('Image.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        $this->imageService->destroy($image);
        return back()->with('success', 'Image deleted successfully.');
    }
}
