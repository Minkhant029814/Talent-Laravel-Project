@extends('layouts.master')

@section('content')

<div class="container">
    <form action="{{route('premissions.update',$roles->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <input type="text" name="name" value="{{$roles->name}}" id="" placeholder="Update your new permissions">
        <button class="btn btn-success" type="submit">Update</button>
    </form>
</div>

@endsection
