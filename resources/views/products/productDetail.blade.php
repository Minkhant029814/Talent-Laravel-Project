@extends('layouts.master')

@section('content')
<div class="col-6 container">
    <h1 class="text-center my-40">Product's Details Info</h1>
    <div>
        <table class="table">
            <thead class="mt-10">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>

                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$products['id']}} </th>
                    <td>{{$products['name']}}</td>
                    <td>{{$products['category']['name']}} </td>
                    <td>{{$products['description']}}</td>
                    <td>{{$products['price']}}</td>

                    <td>
                        <form action="{{route('product.status',['id'=>$products['id']])}}" method="POST">
                            @csrf
                            <button type="submit " class="btn btn-primary {{$products['status'] !== 0 ? "btn btn-success" :"btn btn-danger"}} ">{{$products['status'] !== 0 ? 'Active':'Inactive'
                            }}</button>
                        </form>
                    </td>
                     {{-- @if ($products['status'] == true)
                         <td>Choose</td>


                     @endif
                     @if ($products['status'] == false)
                     <td>Unchoose</td>
                     @endif --}}

                  </tr>
            </tbody>
        </table>
    </div>

    <div class="d-flex   justify-content-between">
        <a href="{{route('product.Index')}}" class="btn btn-primary">back</a>
        <br><br>
        @can('productEdit')


        <a href="{{route('products.edit',['id'=>$products->id])}}" class="btn btn-warning">Edit</a>
        @endcan


            {{-- <button type="submit" class="btn btn-warning">Edit</button> --}}

    </div>
</div>

@endsection
