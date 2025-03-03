@extends('layouts.master')

@section('content')

<div class="container">
    <form action="{{route('roles.update',$roles->id)}}" method="POST">
        @method('PATCH')
        @csrf
        <input type="text" name="name" value="{{$roles->name}}" placeholder="Enter your new Role name">
        <button  class="btn btn-info" type="submit">Update</button>
        @foreach ($permissions as $item)
            <input type="checkbox" name="permissions[]" id="" value="{{$item['id']}}"
            @if (in_array($item->id,$rolePermissions)) checked

            @endif>
            {{-- {{dd($item,$rolePermissions)}} --}}
            <label for="">{{$item->name}}</label> <br>
        @endforeach
    </form>
</div>

@endsection
