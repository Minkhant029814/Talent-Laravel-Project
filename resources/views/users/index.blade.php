@extends('categories.main');


@section('content')
    <div class="container">
        <h1 class="text-primary">User's Information </h1>
        <a href="{{route('users.create')}}" class="btn btn-primary">+Create</a>

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
                    <th>Action</th>
                </tr>
                @foreach ($users as $item)
                    <tr>
                        <th>{{ $item['name'] }}</th>
                        <th>{{ $item['email'] }}</th>
                        <th>{{ $item['address'] }}</th>
                        <th>{{ $item['gender'] }}</th>
                        <th>{{ $item['phone'] }}</th>
                        <th>
                            <div class="d-flex gap-4">
                                <form action="{{ route('users.destroy', $item->id) }} " method="POST">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-info">Edit</a>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@endsection
