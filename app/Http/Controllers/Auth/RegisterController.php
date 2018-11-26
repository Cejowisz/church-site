<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Role;
use JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{


    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users',
            'fullname'=> 'required|min:5|max:200',
            'password'=> 'required|confirmed|min:6|max:200',
            'password_confirmation'=> 'required|min:6|max:200'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'fullname' => $request->get('fullname'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),

        ]);

//        $user->assignRole(Role::find($request->get('role')));

        // Assign a role to this user
        $token = JWTAuth::fromUser($user);

        if($token) {
            return response()->json(compact('token','user'));
        }
        return response('something went wrong', 500);
    }
}
