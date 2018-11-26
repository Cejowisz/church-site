<?php

// namespace App\Http\Controllers\Users;

use JWTAuth;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Administrator;
use App\Models\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    // Gets all the admin
    public function index()
    {
        $users = User::with(['courses','department','result_entry_history'])->get();
        return response($users);
    }

    public function show($id)
    {
        $user = Usesr::with(['courses','department','result_entry_history'])->find($id);
        if ($user) {
            // $user->assignRole(Role::all()->first()->get());
            return $user;
        }
        return response()->json();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return $this->index();
    }

    public function getCurrentUser() {
        $user = JWTAuth::parseToken()->toUser();
        return $user;
    }
}
