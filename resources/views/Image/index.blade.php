@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Welcome To Add Files To Associated Product</h1>
        <a href="{{ route('images.create') }}" class="btn btn-info mb-3">Create New Image</a>

        <div class="container mt-5">
            <h1 class="mb-4">Products List</h1>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>


                                <div class="row">

                                </div>

                                <a href="{{ route('images.show', $product->id) }}" class="btn btn-primary mt-2">Show All Images</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
