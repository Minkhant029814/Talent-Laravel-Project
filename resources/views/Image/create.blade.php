@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Upload Multiple Files</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="files" class="form-label">Select Multiple Files</label>
                    <input type="file" name="files[]" class="form-control" multiple required>
                </div>
                <div class="mb-4">
                    <label for="product_id" class="form-label">Select Your Product</label>
                    <select name="product_id" id="product_id" class="form-control">
                        <option value="">Select  Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Upload</button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <h4>Uploaded Files</h4>
        <ul class="list-group">

        </ul>
    </div>
</div>
@endsection

