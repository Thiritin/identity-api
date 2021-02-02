<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Jumbojett\OpenIDConnectClient;

class LoginController extends Controller
{
    /**
     * Initiate OAUTH Session
     */
    public function init()
    {
        $oidc = new OpenIDConnectClient(
            config('services.hydra.public.url'),
            'ce94f7ac-1c9a-4d5d-8159-56b37562f9b1',
            'optimus1'
        );
        $oidc->setRedirectURL(route('admin.login.callback'));
        $oidc->authenticate();
    }

    /**
     * Exchange token and save userid to session.
     */
    public function callback()
    {

    }
}
