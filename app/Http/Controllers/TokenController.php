<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

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
        [$id, $token] = explode('|', auth()->user()->createToken('API Token')->plainTextToken, 2);
        return [
            'token' => hash('sha256', $token)
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
