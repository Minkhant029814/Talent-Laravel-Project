@extends('layouts.master');


@section('content')
    <div class="container">
        <h1 class="text-primary">User's Information </h1>
        @can('userCreate')
        <a href="{{route('users.create')}}" class="btn btn-primary">+Create</a>

        @endcan

        <div class="card-title ">
            User's Infos
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Role</th>
                    @can('userShow')
                    <th>Action</th>
                    @endcan



                </tr>
                @foreach ($users as $item)
                    <tr>
                        <th>{{ $item['name'] }}</th>
                        <th>{{ $item['email'] }}</th>
                        <th>{{ $item['address'] }}</th>
                        <th>{{ $item['gender'] }}</th>
                        <th>{{ $item['phone'] }}</th>
                        <th> {{$item->roles->pluck('name')->join(',')}}</th>
                        <th>
                            <div class="d-flex gap-4">
                                <form action="{{ route('users.destroy', $item->id) }} " method="POST">

                                    @csrf
                                    @method('DELETE')
                                    @can('userDelete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    @endcan



                                </form>
                                @can('userEdit')
                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                @endcan



                            </div>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@endsection
