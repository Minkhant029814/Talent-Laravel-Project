<?php


namespace App\Repositories\User;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdataRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return User::all();
    }

    public function store(UserRequest $request)
    {
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),



        ]);
        $users->assignRole($request->role);
        return $users;
    }

    public function find($id)
    {
        return User::find($id);
    }
};
