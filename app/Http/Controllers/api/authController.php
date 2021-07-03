<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use App\Models\employee;
use Validator;
class authController extends Controller
{
    public function __construct() {
        $this->middleware('authapi:api', ['except' => ['login']]);

        
    }

   
    public function login(Request $request){
    	$req = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|string|min:5',
        ]);

        if ($req->fails()) {
            return response()->json($req->errors(), 422);
        }

        if (! $token = Auth::guard('api')->attempt($req->validated())) {

            return response()->json(['Auth error' => 'Unauthorized'], 401);
        }

        return $this->generateToken($token);
    }

    /**
     * Sign up.
     *
     * @return \Illuminate\Http\JsonResponse
     */
  

    /*
    admin can create user
  


    /**
     * Sign out
    */
    public function signout() {
        Auth::guard('api')->logout();
        return response()->json(['message' => 'User loged out']);
    }

    /**
     * Token refresh
    */
    public function refresh() {
        return $this->generateToken(Auth::guard('api')->refresh());
    }

    /**
     * User
    */
    public function userProfile() {
        return response()->json(Auth::guard('api')->user());
    }

    /**
     * Generate token
    */
    protected function generateToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
            'user' => Auth::guard('api')->user()
        ]);
    }
}
