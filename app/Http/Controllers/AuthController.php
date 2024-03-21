<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Interfaces\AuthRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponseTrait;

    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $loginData = $this->authRepository->login($credentials);

        if (!$loginData) {
            return $this->errorResponse('Unauthorized', 401);
        }

        return $this->successResponse([
            'user' => new UserResource($loginData['user']),
            'token' => $loginData['token']
        ]);
    }

    public function logout()
    {
        $response = $this->authRepository->logout();

        return $this->successResponse($response);
    }
}
