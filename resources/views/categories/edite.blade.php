@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="text-primary my-4">Categories Edit</h1>
    <form action="{{route('categories.update',['id'=>$category->id])}}" method="POST">
        @csrf
        <input type="text" name="name" value="{{$category->name}}" class="form-control my-4">

        <button type="submit" class="btn btn-success">Update</button>



    </form>

</div>
@endsection
