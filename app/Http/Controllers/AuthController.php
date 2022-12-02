<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\StatusService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * Register new user
     * @param Request $request
     * @return User
     */
    public function register(Request $request): User
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'password' => bcrypt($validatedData['password']),
            'email' => $validatedData['email']
        ]);

        StatusService::createDefault($user);

        return $user;
    }

    /**
     * Authenticate
     * @param Request $request
     * @return User
     * @throws \Exception
     */
    public function login(Request $request): User
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($validatedData)) {
            throw new \Exception('Credentials not match');
        }

        return $request->user();
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        Auth::guard('web')->logout();
    }
}
