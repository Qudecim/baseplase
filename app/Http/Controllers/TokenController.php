<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TokenController extends Controller
{
    /**
     * Show user tokens
     * @param Request $request
     * @return Collection
     */
    public function index(Request $request): Collection
    {
        return $request->user()->tokens()->get()->pluck('token');
    }

    /**
     * Create new token
     * @return array
     */
    public function store(): array
    {
        return [
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ];
    }

    /**
     * Destroy user token
     * @param string $token
     * @return void
     */
    public function destroy(string $token): void
    {
        auth()->user()->tokens()->where('token', $token)->delete();
    }
}
