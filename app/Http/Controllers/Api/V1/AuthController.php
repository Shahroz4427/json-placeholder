<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use JetBrains\PhpStorm\ArrayShape;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class AuthController extends Controller
{

    /**
     * Create a new user.
     *
     * @param array $data
     * @return array
     */
    #[ArrayShape(['id' => "mixed", 'name' => "mixed", 'email' => "mixed"])]
    public function createUser(array $data): array
    {
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ];
    }

    /**
     * Register a new user.
     *
     * @param RegisterUserRequest $request
     * @return JsonResponse
     */
    public function register(RegisterUserRequest $request): JsonResponse
    {
        $user = $this->createUser($request->validated());

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ], ResponseAlias::HTTP_CREATED);
    }

    /**
     * Authenticate user.
     *
     * @param LoginUserRequest $request
     * @return JsonResponse
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        if (!auth()->attempt($request->validated())) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], ResponseAlias::HTTP_UNAUTHORIZED);
        }

        $user = $request->user();

        $token = $user->createToken($user->name . '-AuthToken')->plainTextToken;

        return response()->json([
            'token_type' => 'Bearer',
            'token' => $token,
        ], ResponseAlias::HTTP_OK);
    }
}
