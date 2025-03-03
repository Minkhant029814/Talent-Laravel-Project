@extends('layouts.master')
@section('content')

<div class="container" >
    <form action="{{route('roles.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Enter your Role name"  class="form-control">

            @foreach ($permissions as $item)
            <input type="checkbox" name="permissions[]" value="{{$item['id']}}">
            <label for="">{{$item->name}}</label> <br>
            @endforeach



        <button type="submit" class="btn btn-primary">Create </button>
    </form>

</div>


@endsection
