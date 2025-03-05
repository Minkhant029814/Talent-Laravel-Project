<?php

namespace App\Repositories\Permissions;
use App\Repositories\Permissions\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface{
    public function find($id)
    {
        return Permission::find($id);

    }
};
