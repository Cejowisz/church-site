<?php

namespace App\Http\Controllers\Auth;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    // Get all the roles
    public function index() {
        $roles = Role::with('permissions')->get();
        return $roles;
    }

    public function show($id)
    {
        return Role::where('id', $id)->with('permissions')->get();
    }

    public function store(Request $request) {
        $role = new Role;
        $role->name = $request->name;
        $role->guard_name = 'api';

        $this->assigRoles($request, $role);
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;

        $this->assigRoles($request, $role);
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return $this->index();
    }

    public function assigRoles($req, $roles)
    {
        $userPerms = [];

        foreach ($req->permissions as $perm) {

            if (
                strtolower($perm) == "edit profile" ||
                strtolower($perm) == "add device"
            ) {
                $userPerms[] = $perm;
            }

        }

        if ($roles->save()) {
            // Sync roles accordingly.
            if (strtolower($roles->name) == "user") {
                $roles->syncPermissions($userPerms);
            }

            elseif(strtolower($roles->name) == "admin") {
                $roles->syncPermissions(Permission::all());
            }
            return $this->index();
        }
        return response('Something went wrong', 500);
    }
}

