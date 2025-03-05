<?php

namespace App\Repositories\Roles;

use Spatie\Permission\Models\Role;
use App\Repositories\Roles\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class RoleRepository implements RoleRepositoryInterface{
    public function index(){
            return Role::all();

    }
    public function find($id)
    {
            return Role::find($id);

    }

    public function store(Request $request){
        $roles = Role::create([
            'name'=>$request->name
        ]);
        return $roles;
    }

}
