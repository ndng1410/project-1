<?php

use App\Http\Controllers\AuthenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
// use Illuminate\Routing\Controllers\Middleware;
// use App\Http\Middleware\CustomAuthenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('register', [
    AuthenController::class,
    'register',
]);

Route::get('login', [
    AuthenController::class,
    'getLogin',
]);

Route::get('/task', [
    TaskController::class,
    'index',
]);







