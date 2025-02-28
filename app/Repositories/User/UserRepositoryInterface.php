<?php

namespace App\Repositories\User;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdataRequest;

interface UserRepositoryInterface{
    public function index();
    public function store(UserRequest $request);
    public function find($id);

};
