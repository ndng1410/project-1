<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return $this->userRepository->getAll();
    }

    public function register(Request $request) {
        return $this->userRepository->register($request);
    }

    public function login(Request $request) {
        return $this->userRepository->login($request);
    }

    public function logout(Request $request) {
        return $this->userRepository->logout($request);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
