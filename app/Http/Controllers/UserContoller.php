<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdataRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

// class UserController extends Controller
// {
    // protected $userRepository;

    // public function __construct(UserRepositoryInterface $userRepository)
    // {
    //     $this->userRepository = $userRepository;
    // }

    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //    $users = $this->userRepository->index();
    //     return view('users.index',compact('users'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     return view('users.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(UserRequest $request)
    // {
    //     $datas =    $this->userRepository->store($request);
    //     return redirect()->route('user.index');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit( $id)
    // {
    //     $user  = $this->userRepository->find($id);
    //     // dd($user);
    //     return view('users.edit',compact('user'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request)
    // {
    //     // dd('heelo');
    //     // dd($request);
    //     $user = User::where('id', $request->id)->first();
    //     dd($user);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy($id)

    // {
    //     $user = $this->userRepository->find($id);
    //     $user->delete();
    //     return redirect()->route('user.index');
    // }
// }
