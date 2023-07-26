<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Support\Facades\Hash;


class AuthenController extends Controller
{
    public function login(Request $request)
    {
        $login = $request->all();
        if(Auth::attempt($login)) {
            return response([
                'message' => 'success',
            ]);
        } else {
            return response([
                'message' => 'fail',
            ]);
        }
    }

    public function register(Request $request) {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return $user;
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
