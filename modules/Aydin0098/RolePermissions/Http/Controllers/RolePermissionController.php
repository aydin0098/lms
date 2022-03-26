<?php

namespace Aydin0098\RolePermissions\Http\Controllers;

use App\Http\Controllers\Controller;
use Aydin0098\Category\Responses\AjaxResponses;
use Aydin0098\RolePermissions\Http\Requests\RoleRequest;
use Aydin0098\RolePermissions\Http\Requests\RoleUpdateRequest;
use Aydin0098\RolePermissions\Repositories\PermissionRepo;
use Aydin0098\RolePermissions\Repositories\RoleRepo;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{

    private RoleRepo $roleRepo;
    private PermissionRepo $permissionRepo;
    public function __construct(RoleRepo $roleRepo , PermissionRepo $permissionRepo)
    {
        $this->roleRepo = $roleRepo;
        $this->permissionRepo = $permissionRepo;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = $this->roleRepo->all();
        $permissions = $this->permissionRepo->all();
        return view('RolePermissions::index',compact('roles','permissions'));
    }

    public function store(RoleRequest $request)
    {
        $this->roleRepo->create($request);
        return back();
    }

    public function edit($id)
    {
        $role = $this->roleRepo->findById($id);
        $permissions = $this->permissionRepo->all();
        return view('RolePermissions::edit',compact('role','permissions'));
    }

    public function update(RoleUpdateRequest $request , $id)
    {
        $role = $this->roleRepo->update($request,$id);
        return redirect()->route('role-permissions.index');

    }

    public function destroy($id)
    {
        $role = $this->roleRepo->delete($id);
        return AjaxResponses::success();

    }
}
