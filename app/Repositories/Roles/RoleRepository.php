<?php

namespace App\Repositories\Roles;

use Spatie\Permission\Models\Role;
use App\Repositories\Roles\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class RoleRepository implements RoleRepositoryInterface{
    public function index(){
            $roles = Role::all();
            return $roles;
    }
    public function find($id)
    {
            $role = Role::find($id);
            return $role;
    }

    public function store(Request $request){
        $roles = Role::create([
            'name'=>$request->name
        ]);
        return $roles;
    }

}
