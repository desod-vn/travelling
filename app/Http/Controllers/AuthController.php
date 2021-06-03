<?php

namespace App\Http\Controllers;

use App\Status;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;



class AuthController extends Controller
{
    // Đăng nhập
    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password]))
        {
            $user = User::where('name', $request->name)->first();

            $user->token = $user->createToken('App')->accessToken;

            return response()->json([
                'status' => Status::SUCCESS,
                'message' => 'Authenticated.',
                'token' => $user->token,
            ]);
        }

        return response()->json([
            'status' => Status::FAILURE,
            'message' => 'Unauthenticated.',
        ]);
    }

    // Đăng ký
    public function register(RegisterRequest $request)
    {
        $user = new User;

        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->slug = Str::slug($request->name, '-');

        if($request->gender == 'Nam')
            $user->avatar = Status::APP . 'default/male.png';
        else
            $user->avatar = Status::APP . 'default/female.png';

        $user->save();

        $user->token = $user->createToken('App')->accessToken;

        return response()->json([
            'status' => Status::SUCCESS,
            'message' => 'Authenticated.',
            'token' => $user->token,
        ]);
    }

    // Đăng xuất
    public function logout()
    {
        if (Auth::check())
        {
            Auth::user()->token()->revoke();

            return response()->json([
                'status' => Status::SUCCESS,
                'message' => 'Unauthenticated.',
            ]);
        }
    }
}
