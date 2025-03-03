@extends('layouts.master')

@section('content')

   {{-- // {{dd($roles)}} --}}
    <div class="container">
            <a href="{{route('roles.create')}}" class="btn btn-success">Create</a>
        <table class="table">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Acitons</td>
            </tr>

                @foreach ($roles as $item)
                <tr>
                 <td>{{$item->id}}</td>
                 <td>{{$item->name}}</td>
                 <td>
                    <div class="d-flex gap-2">
                 <form action="{{route('roles.destroy',$item->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>

                 </form>

                 <a href="{{route('roles.edit',$item->id)}}" class="btn btn-info">Edit</a>
                </td>
            </div>
                </tr>
                @endforeach

        </table>

    </div>
@endsection
