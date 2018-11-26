<?php

namespace App\Http\Controllers\Users;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        $perm = Permission::all();
        return $perm;
    }

    public function show($id)
    {
        return Permission::where('id', $id)->get();
    }

    public function store(Request $request) {
        $role = new Permission;
        $role->name = $request->name;
        $role->guard_name = 'api';

        if ($role->save()) {
            return $this->index();
        }
    }

    public function update(Request $request, $id)
    {
        $perm = Permission::find($id);
        $perm->name = $request->name;
        if($perm->save()) {
            return $this->index();
        }
        return response('Something went wrong', 500);
    }

    public function destroy($id)
    {
        $perm = Permission::find($id);
        $perm->delete();
        return $this->index();
    }
}
