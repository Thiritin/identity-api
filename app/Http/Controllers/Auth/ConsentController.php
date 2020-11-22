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
