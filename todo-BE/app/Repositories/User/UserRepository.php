<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Contracts\HasApiTokens;

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

    public function login(Request $request) {
        // $login = $request->all();
        // if(Auth::attempt($login)) {
        //     return response([
        //         'message' => 'success',
        //     ]);
        // } else {
        //     return response([
        //         'message' => 'failed',
        //     ]);
        // }
        $login = $request->only('email', 'password');
        if(Auth::attempt($login)) {
            /** @var \App\Models\User $user **/
            $user = Auth::user();
            $accessToken = $user->createToken('token')->plainTextToken;
            return response()->json(['access_token' => $accessToken], 200);
        } else {
            return response()->json(['message' => 'invalid'], 401);
        }
    }

    public function logout(Request $request) {
        // Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
    
}