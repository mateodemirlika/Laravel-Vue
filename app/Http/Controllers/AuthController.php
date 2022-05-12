<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name'=> $fields['name'],
            'email'=> $fields['email'],
            'password'=> $fields['password']
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=> $token
        ];

        return response($response,201);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return [
            'message '=> 'Logged Out'
        ];
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        //Check Email
        $user = User::where('email',$fields['email'])->first();

        //Check Password
        if(!$user){
            return response([
                'message'=>'Bad Creds'
            ],401);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=> $token
        ];

        return response($response,201);
    }


}
