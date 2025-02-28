<?php


namespace App\Repositories\User;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdataRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class UserRepository implements UserRepositoryInterface{
    public function index(){
        $users = User::all();
        return $users;
    }

    public function store(UserRequest $request)
    {
        $users = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'password'=>Hash::make($request->password),



        ]);
        return $users;
    }

    public function find($id)
    {
        $user = User::find($id);
        return $user;
    }


};



