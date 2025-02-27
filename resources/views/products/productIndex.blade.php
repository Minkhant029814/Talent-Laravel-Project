@extends('categories.main')

@section('content')
<div class="container">
    <h1 class="my-2">Welcome to Show Products</h1>

    <a href="{{route('product.create')}}" class="btn btn-success mb-3">Create</a>
    {{$products->links()}}
    @foreach ($products as $product)
        <div class="card my-4">
            <div class=" card-header">
                {{$product['id']}}
            </div>
            <div class="card-body">
                    {{$product['name']}}
            </div>
            <div class="d-flex justify-content-between card-footer">
                <a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger me-12">Delete</a>

                <a href="{{route('product.details',['id'=>$product->id])}}" class="btn btn-info mx-12">detail</a>

            </div>
        </div>
    @endforeach


</div>


@endsection
