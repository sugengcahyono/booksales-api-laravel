<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request) {
        // 1. set up validator 
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);
        // 2. cek validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // 3. create user
        $user = User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password' => bcrypt($request->password)
        ]);
        // 4. cek keberhasilan 
        if ($user) {
            return response()->json([
                'succes' =>true,
                'message' => 'User Created succefully',
                'data' => $user
            ], 201);
        }
        // 5. cek gagal 
        return response()->json([
            'succes' => false,
            'message' => 'user creation fail'
        ], 409);  //conflict
    }

    public function login(Request $request) {
        // 1. setup validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'

        ]);
        // 2. cek validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //  3. get kredensial dari request
        $credentials = $request->only('email', 'password');

        // 4. cek isfailed
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password Anda salah '
            ], 401);

        };
        // 5. cek issucces
        return response()->json([
            'success' =>true,
            'message' => 'login succes',
            'user' => auth()->guard('api')->user(),
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request) {
        // try
        // 1. Invalidate token
        // 2. Cek issucces
        
        // catch
        // 1. cek isfailed 

        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return response()->json([
                'success' => true,
                'message' => 'Logout succesfully'
            ], 200);

        } catch (JWTException $e) {
            return response()->json([
                'succes' => false,
                'message' => 'Logout Failed!'
            ], 500);

        }
    }
}
