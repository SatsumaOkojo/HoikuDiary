<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{

    public function __construct(
        private readonly AuthManager $auth,
    ) {
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if ($this->auth->guard()->attempt($credentials)) {
            $request->session()->regenerate();

            return new JsonResponse([
                'message' => 'Authenticated.',
            ]);
        }

        throw new AuthenticationException(); 
    }
}
