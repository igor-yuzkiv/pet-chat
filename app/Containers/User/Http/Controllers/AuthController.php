<?php

namespace App\Containers\User\Http\Controllers;

use App\Containers\User\Http\Requests\RegisterRequest;
use App\Containers\User\Models\User;
use App\Containers\User\Transformers\UserTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use League\Fractal\Serializer\ArraySerializer;

/**
 *
 */
class AuthController
{

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function currentUser(Request $request): JsonResponse
    {
        $user = $request->user();
        return fractal($user)
            ->transformWith(new UserTransformer())
            ->serializeWith(ArraySerializer::class)
            ->respond();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email'    => ['required'],
            'password' => ['required'],
        ]);

        if (!\Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'The provided credentials do not match our records'
            ], 401);
        }
        $user = \Auth::user();
        $userData = fractal($user)
            ->transformWith(new UserTransformer())
            ->serializeWith(ArraySerializer::class)
            ->toArray();

        $token = $user->createToken(name: 'auth_token')->plainTextToken;
        return response()->json([
            'user'  => $userData,
            'token' => $token
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function logout()
    {
        \Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out'
        ]);
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function registration(RegisterRequest $request): JsonResponse
    {
        $userData = $request->validated();
        $userData['password'] = \Hash::make($userData['password']);
        $user = User::create($userData);

        return fractal($user)
            ->transformWith(new UserTransformer())
            ->serializeWith(ArraySerializer::class)
            ->respond();
    }
}
