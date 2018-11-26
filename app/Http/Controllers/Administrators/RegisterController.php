<?php

namespace App\Http\Controllers\Users;

use JWTAuth;
use Validator;
use Config;
use App\Models\Role;
use App\Models\Administrator;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RegisterController extends Controller
{
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        // Config::set('jwt.user', 'App\User');
        // Config::set('auth.providers.users.model', \App\User::class);
        // Config::set('auth.providers.users.model', \App\User::class);

        // config(['auth.model' => User::class]);
        // config(['auth.table' => 'users']);
        // config(['jwt.user' => User::class]);
        
        $credentials = $request->only('email', 'password');

        try {
            // return response()->json(['error' => JWTAuth()], 401);
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = JWTAuth::toUser($token);
        return response()->json(compact('token','user'));
    }


    // Refresh Token
    public function refresh(Request $request){
        $newToken = JWTAuth::refresh($request->token);
        return $newToken;
    }


    // Register new User
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:administrators',
            'fullname' => 'required|max:50',
            'username' => 'required|max:50',
            'password'=> 'required|confirmed|min:6|max:200'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $admin = Administrator::create([
            'fullname' => $request->get('fullname'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'department_id' => $request->get('department_id'),
            'password' => bcrypt($request->get('password')),
        ]);
        // $admin->assignRole('exam_officer');
        // Assign role the user.
        // $admin->assignRole(Role::find($request->role));
        $admin->assignRole(Role::find($request->get('role')));

        $token = JWTAuth::fromUser($admin);

        if($token) {
            return $token;
        }
        return response('something went wrong', 500);
    }
}
