@extends('layouts.master')

@section('content')
    <div class="container">
        <a href="{{route('premissions.create')}}" class="btn btn-primary">create Permissions</a>
        <table class="table">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Actions</td>
            </tr>
            @foreach ($permissions as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <form action="{{route('premissions.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>

                        <a href="{{route('premissions.edit',$item->id)}}" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
