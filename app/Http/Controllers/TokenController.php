<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{

    public function index(Request $request)
    {
        return $request->user()->tokens()->get()->pluck('token');
    }

    public function store(): array
    {
        return [
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ];
    }

    public function destroy(Request $request, string $token): void
    {
        auth()->user()->tokens()->where('token', $token)->delete();
    }
}
