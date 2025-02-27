@extends('categories.main')

@section('content')
<div class="container">
    <form action="{{route('products.update',['id'=>$product->id])}}" method="POST">
        @csrf

        @foreach ($errors->all() as $error)
            <p class="alert alert-danger my-10">
                {{$error}}
            </p>
        @endforeach


        <div class="my-3">
            <label for="">New Product Name</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="category" class="form-check-label">Select Your Cateogry</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id ==  $category->id ? 'selected' : " "}}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="">Add New Description</label>
            <input type="text" name="description" value="{{$product->description}}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Add New price</label>
            <input type="number" name="price" value="{{$product->price}}" class="form-control">
        </div>
        <div class="form-check form-switch">
            {{-- @if ($product['status'] == true)
            <input type="checkbox" name="status" role="switch" id="status_switch" class="form-check-input" value="1" checked>
            @endif
            @if ($product['status'] == false)
            <input type="checkbox" name="status" role="switch" id="status_switch" class="form-check-input" value="0">

            @endif --}}
            <div class="form-check form-switch">
                <input type="checkbox" name="status" role="switch" id="status_switch" class="form-check-input" value="1"
                {{ $product->status ? 'checked' : '' }}>
                <label class="form-check-label" for="status_switch">Active</label>
            </div>



           </div>
        <div class="mb-3">
            <input type="submit" value="Update" class="btn btn-primary">

        </div>




    </form>
</div>

@endsection
