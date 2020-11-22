<?php
/*
 * Eurofurence Identity Provider Authentication Backend
 *
 * @copyright	Copyright (c) 2020 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://github.com/Thiritin/ef-idp
 */

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
        if (!Auth::attempt($loginData)) {
            return Response::json(
                [
                    'message' => 'Authentication failed.',
                ],
                \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $hydraResponse = $hydra->acceptLoginRequest(Auth::id(), $request->get('login_challenge'));
        return new LoginResource($hydraResponse->redirect_to);
    }
}
