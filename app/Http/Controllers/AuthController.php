<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\AuthenticationTokenHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthenticationTokenHandler $tokenHandler): JsonResponse
    {
        $validated = $request->validated();
        $user = User::query()->where('email', $validated['email'])->first();

        if (!Hash::check($validated['password'], $user->password)) {
            abort(Response::HTTP_UNAUTHORIZED, __('response.unauthorized'));
        }

        return response()->json([
            'data' => [
                'token' => $tokenHandler->generateToken($user)
            ]
        ]);
    }
}
