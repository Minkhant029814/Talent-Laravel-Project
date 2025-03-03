@extends('layouts.master')

@section('content')

<div class="container">
    <form action="{{route('premissions.store')}}" method="POST">
        @csrf
        <input type="text" name="name" id="" class="form-control" placeholder="Create New permissions">
        {{-- @foreach ($permissions as $item)
            <input type="checkbox" value="">
            <label for="">{{$item->name}}</label> <br>
        @endforeach --}}
        <input type="submit" value="create" class="btn btn-info">

    </form>
</div>

@endsection
