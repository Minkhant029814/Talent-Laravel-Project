<?php

namespace App\Http\Controllers;

use App\Repositories\Permissions\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Repositories\Permissions\PermissionRepository;
class PermissionController extends Controller
{


    protected $PermissionRepository ;

    public function __construct(PermissionRepositoryInterface $permissionRepository)

    {
        $this->PermissionRepository = $permissionRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Permission::create([
            'name'=>$request->name
        ]);
            return redirect()->route('premissions.index');
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
        $roles = $this->PermissionRepository->find($id);
        return view('permissions.edit',compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = $this->PermissionRepository->find($id);
        $permission->update([
            'name'=>$request->name
        ]);
        return redirect()->route('premissions.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $permission = $this->PermissionRepository->find($id);

        $permission->delete();
        return redirect()->route('premissions.index');

    }
}
