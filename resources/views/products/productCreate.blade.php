@extends('layouts.master')

@section('content')

<div class="container col-6">
    <h1>Create New Products</h1>

        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach



    <form action="{{route('product.save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="">Product Name</label>
            <input type="text" name="name" placeholder="Enter product Name" class="form-control">
        </div>
        <div class="mb-4">
            <label for="">Product's Description</label>
            <input type="text" name="description" placeholder="Enter product's description" class="form-control">
        </div>
        <div class="mb-4">
            <label for="">Product's Price</label>
            <input type="number" name="price" placeholder="Enter Product's price" class="form-control">
        </div>
        <div class="mb-4">
            <label for="category_id" class="form-label">Select Your Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="">File</label>
            <input type="file" name="image" class="form-control">
        </div>
       <div class="form-check form-switch">
        <input type="hidden" name="status" value="0">
        <input type="checkbox" name="status" role="switch" id="status_switch" class="form-check-input" value="1">


       </div>
        <div class="">
            <input type="submit" value="Save" class="btn btn-success" >
        </div>

    </form>
</div>
@endsection
