<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            "username" => 'required',
            "password" => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'message' => 'Username and password are required'
            ], 200);
        } else {
            $credentials = request(['username', 'password']);
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'error' => true,
                    'message' => 'Username or password invalid'
                ], 200);
            }
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user, true);
            return response()->json([
                'error' => false,
                'message' => 'Success Login'
            ], 200);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route("login");
    }
}
