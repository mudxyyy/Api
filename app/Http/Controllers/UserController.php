<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //INI UNTUK PROSES REGISTRASI
    public function register(Request $request)
    {
        $reg = $request->validate(
            [
                'name' => 'required',
                'username' => 'required|unique:users',
                'password' => 'required',
            ]
        );

        User::create(
            [
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ]
        );

        return response(
            [
                'message' => 'Anda Berhasil Registrasi'
            ]
        );
    }

    //INI UNTUK PROSES LOGIN
    public function login(Request $request)
    {
        $log = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );

        if (auth()->attempt($log)) {
            $token = auth()->user()->createToken('tkn')->plainTextToken;

            return response(
                [
                    'message' => 'Login Success. Welcome',
                    'data' => $token
                ]
            );
        }
        return response(
            [
                'message' => 'Unauthenticated'
            ],
            401
        );
    }

    //INI UNTUK PROSES LOGOUT
    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response(
            [
                'message' => 'Logout Success. Good Bye'
            ]
        );
    }
}
