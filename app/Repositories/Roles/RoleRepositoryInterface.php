<?php

namespace App\Repositories\Roles;

use Illuminate\Http\Request;

interface RoleRepositoryInterface {
    public function index();
    public function find($id);
    public function store(Request $request);
};
