<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Resources\API\LoginResources;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = User::where('email', $request->email)->first();
            $user->tokens()->delete();
             $token = $user->createToken('token')->plainTextToken;

             return new LoginResources([
                'token' => $token,
                'user' => $user,
             ]);
        }else{
            return response()->json([
                'message' => 'Invalid Credentials'], 401);
        }
    }







    public function logout(Request $request)
    {
        // dd($request->user());
    //  $request->user()->currentAccessToken()->delete();
        $request->user()->tokens()->delete();
     return response()->noContent();
    }

}
