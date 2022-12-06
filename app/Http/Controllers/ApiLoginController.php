<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiLoginController extends Controller
{
    public function login(Request $req)
    {
        if (\Auth::attempt(
            [
                'email' => $req->email,
                'password' => $req->password
            ]
        )) {
            $user = \Auth::user();
            $token = $user->createToken('user')->accessToken;
            $data['user'] = $user;
            $data['token'] = $token;
            return response()->json(
                [
                    'success' => true,
                    'data' => $data,
                    'pesan' => 'login berhasil'
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'success' => false,
                    'data' => '',
                    'pesan' => 'login gagal'
                ],
                401
            );
        }
    }

    public function register(Request $req){
        $password = bcrypt($req->password);
        $data = User::create([
            'name' => $req->username,
            'email' => $req->email,
            'password' => $password
        ]);
        return response()->json(
            [
                'success' => true,
                'data' => $data,
                'pesan' => 'login berhasil'
            ],
            200
        );
    }
}
