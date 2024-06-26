<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        /** @var User $user */

        $validated = $request->validated();
        $user = User::query()->where('email', $validated['email'])->first();

        if (!Hash::check($validated['password'], $user->password)) {
            abort(Response::HTTP_UNAUTHORIZED, __('response.unauthorized'));
        }

        return response()->json([
            'data' => [
                'token' => $user->generateToken()
            ]
        ]);
    }
}
