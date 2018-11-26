<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Models\Role;
use App\Models\Administrator;
use App\Models\User;


class UsersController extends Controller
{
    // Gets all the admin
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return response($users);
    }

  
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
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