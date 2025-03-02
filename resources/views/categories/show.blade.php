@extends('layouts.master')

@section('content')

<div class="container">

    <div class="card">
        <div class="card-header">Category Show</div>
        <div class="bg-primary text-white card-body ">{{$category['id']}} </div>

        <div class="bg-primary text-white  card-body">{{$category['name']}}</div>
        <a href="{{route('categories.index')}}" class="card-footer btn btn-outline">back</a>
    </div>


</div>
@endsection
