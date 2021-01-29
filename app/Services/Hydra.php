<?php

namespace App\Services;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Ory\Hydra\Client\Api\AdminApi;
use Ory\Hydra\Client\Configuration;
use Ory\Hydra\Client\Model\AcceptConsentRequest;
use Ory\Hydra\Client\Model\AcceptLoginRequest;

class Hydra
{
    private AdminApi $api;

    public function __construct($host = 'hydra:4445')
    {
        $configuration = (new Configuration())->setHost('hydra:4445');
        $this->api = new AdminApi(null, $configuration);
    }

    public function getLoginRequest(string $loginChallenge)
    {
        try {
            return $this->api->getLoginRequest($loginChallenge);
        } catch (Exception $e) {
            if ($e->getCode() === 404) {
                throw new ModelNotFoundException('The requested Resource does not exist.');
            }

            return $e;
        }
    }

    public function acceptLoginRequest(string $userId, string $loginChallenge)
    {
        try {
            return json_decode(
                $this->api->acceptLoginRequest(
                    $loginChallenge,
                    new AcceptLoginRequest(
                        [
                            'subject' => $userId,
                        ]
                    )
                )
            );
        } catch (Exception $e) {
            if ($e->getCode() === 404) {
                throw new ModelNotFoundException('The requested Resource does not exist.');
            }
            Log::error($e->getMessage());
            throw $e;
        }
    }

    public function acceptConsentRequest(string $consentChallenge)
    {
        try {
            return $this->api->acceptConsentRequest($consentChallenge, new AcceptConsentRequest([
                "grantScope" => ["openid", "offline_access"],
                "remember" => "true",
                "rememberFor" => "0"
            ]));
        } catch (Exception $e) {
            if ($e->getCode() === 404) {
                throw new ModelNotFoundException('The requested Resource does not exist.');
            }
            throw $e;
        }
    }
}
