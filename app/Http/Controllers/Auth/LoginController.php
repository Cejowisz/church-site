<?php

namespace App\Http\Controllers\Auth;

use Validator;
use Config;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{

//    use AuthenticatesUsers;

    // Refresh Token
    public function refresh(Request $request){
        $newToken = JWTAuth::refresh($request->token);
        return $newToken;
    }
    
    public function userLogin(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = JWTAuth::toUser($token);

        return response([
            'token' => $token,
            'user' => $user
        ]);


        /*if($user){
            if($user->is_student == 1 || $user->is_student == '1'){
                $student = Student::where('id', $user->id)->get();
                $student['roles'] = $user->roles;
                $student['permissions'] = $user->permissions;
                $user = $student;
                return response()->json(compact('token','user'));
            }else{
                return response()->json(compact('token','user'));
            }
        }*/
    }

}
