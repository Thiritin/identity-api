<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        return new LoginResource($link);
    }
}
