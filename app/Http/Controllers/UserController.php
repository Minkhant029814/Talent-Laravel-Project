<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    protected $userRepository ;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $users = $this->userRepository->index();
            return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $roles = Role::all();

        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $datas =    $this->userRepository->store($request);
        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
         $user = $this->userRepository->find($id);
         $roles = Role::all();
         return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $users = $this->userRepository->find($id);
        $users ->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'gender'=>$request->gender,



        ]);
        $users->syncRoles($request->role);

        return redirect()->route('users.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $user = $this->userRepository->find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
