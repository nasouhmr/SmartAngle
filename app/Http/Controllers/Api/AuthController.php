<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->toArray());

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];

        return response($response, 200);
    }

    public function login(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response()->json([
                    'data'         => $response,
                    'message'      => 'success!',
                    'error'      => 200
                ], 200); 
            } else {
                $response = "Password missmatch";
                return response()->json([
                    'data'         => $response,
                    'message'      => 'success!',
                    'error'      => 422
                ], 200); 
            }
        } else {
            $response = 'User does not exist';
            return response()->json([
                'data'         => $response,
                'message'      => 'success!',
                'error'      => 422
            ], 200); 
        }
    }

    public function logout(Request $request)
    { 
        $token = $request->user()->token();
        $token->revoke();

        $response = 'You have been succesfully logged out!';
        return response()->json([
            'data'         => $response,
            'message'      => 'success!',
            'error'      => 200
        ], 200); 
    }

    public function getUser(Request $request)
    { 
        return response()->json([
            'data'         => $request->user(),
            'message'      => 'success!',
            'error'      => 200
        ], 200);  
    }

}
