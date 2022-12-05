<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
