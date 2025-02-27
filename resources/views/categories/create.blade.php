@extends('categories.main')

@section('content')
<div class="container">
    <h1 class="text-bold my-4">Create Your Product</h1>
    <form action="{{route('categories.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="enter something" class="form-control my-4" >
        <button type="submit" class="btn btn-success ">save</button>
    </form>

</div>
@endsection
