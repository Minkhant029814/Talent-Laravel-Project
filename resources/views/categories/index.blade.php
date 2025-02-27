@extends('categories.main')

@section('content')
<div class="container">
    <h1 class="text-bold"> Categories Lists</h1>
    <a href="{{route('categories.create')}}" class="btn btn-outline-success my-4">+create</a>
    <div class="container card">
        @foreach ($data as $item)
        <div class="card-title">
          <span class="text-info"> {{$item['id']}} </span>
           <span>  {{$item['name']}} </span>
        </div>
        <div class="d-flex card-body">
            <a href="{{ route('categories.show', ['id' => $item->id]) }}" class="btn btn-success me-4">show</a>


            <a href="{{route('categories.edit',['id'=>$item->id])}}" class="btn btn-primary me-4">Edit</a>

        </div>
        <div class="card-footer">
            <form action= "{{route('categories.delete',$item->id)}}" method="POST">
                @csrf
                <button class="form-control btn btn-danger">Delete</button>
            </form>
        </div>
        @endforeach

    </div>











@endsection
