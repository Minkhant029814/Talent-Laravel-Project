@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">{{ $product->name }} - All Images</h1>
    <a href="{{ route('images.index') }}" class="btn btn-info mb-3">Back to Products</a>

    <div class="row">
        @foreach ($product->image as $image)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">

                    <img src="{{ asset('storage/' . $image->path) }}" class="card-img-top img-fluid" alt="{{ $image->name }}" style="object-fit: cover; height: 200px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $image->name }}</h5>
                        <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Image</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
