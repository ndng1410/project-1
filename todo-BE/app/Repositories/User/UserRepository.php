<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface {
    public function getModel() {
        return User::class;
    }

    public function register(Request $request) {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        return $user;
    }

    public function login(Request $request): Response {
        $login = $request->all();
        if(Auth::attempt($login)) {
            return response([
                'message' => 'success',
            ]);
        } else {
            return response([
                'message' => 'failed',
            ]);
        }
    }

    public function logout(Request $request): Response {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return response([
            'message' => 'success',
        ]);
    }
    
}