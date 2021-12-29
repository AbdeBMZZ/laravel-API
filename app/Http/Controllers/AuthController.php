<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        
        $fields = $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'username' => $fields['username'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;
        
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
        
    }

    public function login(Request $request){
        $fields = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('username',$fields['username'])->first();
        
        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response(['message' => 'Bad creds'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;
        
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(){

        Auth()->user()->tokens()->delete();


        return response()->json('Successfully logged out');
    }

    public function getUser(){
        return Auth()->user();
    }
}
