<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Repositories\Roles\RoleRepositoryInterface;
use PhpParser\Node\Expr\FuncCall;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
        protected $Rolerepository ;

        public function __construct(RoleRepositoryInterface $RoleRepository)
        {
            $this->Rolerepository = $RoleRepository;
        }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $roles = $this->Rolerepository->index();


            return view('Roles.index',compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $permissions = Permission::all();
            $roles = Role::all();
            return view('Roles.create',compact('permissions','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
      {
          $roles =  $this->Rolerepository->store($request);
          $roles ->permissions()->attach($request['permissions']);

            return redirect()->route('roles.index');


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
    public function edit(string $id)
    {
        $roles = $this->Rolerepository->find($id);
        $permissions = Permission::all();
        $rolePermissions = $roles->permissions->pluck('id')->toArray();

        return view('Roles.edit',compact('roles','permissions','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $roles = $this->Rolerepository->find($id);
        $roles->update([
            'name'=>$request->name
        ]);
        $roles->permissions()->sync($request['permissions']);
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $roles = $this->Rolerepository->find($id);
        $roles ->delete();
        return   redirect()->route('roles.index');
    }
}
