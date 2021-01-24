<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsentRequest;
use App\Services\Hydra;

class ConsentController extends Controller
{
    public function __invoke(ConsentRequest $request)
    {
        $hydra = new Hydra();
        $response = $hydra->acceptConsentRequest($request->get('consent_challenge'));

        return redirect(json_decode($response, 1)['redirect_to']);
    }
}
