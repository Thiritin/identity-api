<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Providers\HydraServiceProvider;
use App\Services\Hydra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $hydra = new Hydra();
        $loginData = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        if (! Auth::attempt($loginData)) {
            return Response::json(
                [
                    'message' => 'Authentication failed.',
                ],
                \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $hydraResponse = $hydra->acceptLoginRequest(Auth::user()->getHashId(), $request->get('login_challenge'));
        abort_if(empty($hydraResponse->redirect_to), 500);

        return new LoginResource($hydraResponse->redirect_to);
    }
}
