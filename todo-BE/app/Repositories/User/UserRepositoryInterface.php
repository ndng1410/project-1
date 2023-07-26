<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

interface UserRepositoryInterface extends RepositoryInterface {
    public function register(Request $request);

    public function login(Request $request);

    public function logout(Request $request);
}