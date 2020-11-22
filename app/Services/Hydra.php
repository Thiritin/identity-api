<?php
/*
 * Strive Authentication Backend
 *
 * @copyright	Copyright (c) 2020 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://github.com/Thiritin/strive
 */

/*
 * Strive Authentication Backend
 *
 * @copyright	Copyright (c) 2020 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://github.com/Thiritin/strive
 */

namespace App\Services;


use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Ory\Hydra\Client\Api\AdminApi;
use Ory\Hydra\Client\Configuration;
use Ory\Hydra\Client\Model\AcceptConsentRequest;
use Ory\Hydra\Client\Model\AcceptLoginRequest;

class Hydra
{
    private AdminApi $api;

    public function __construct($host = "hydra:4445")
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
                throw new ModelNotFoundException("The requested Resource does not exist.");
            }
            return $e;
        }
    }

    public function acceptLoginRequest(int $userId, string $loginChallenge): array
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
                throw new ModelNotFoundException("The requested Resource does not exist.");
            }
            throw $e;
        }
    }

    public function acceptConsentRequest(string $consentChallenge)
    {
        try {
            return $this->api->acceptConsentRequest($consentChallenge, new AcceptConsentRequest());
        } catch (Exception $e) {
            if ($e->getCode() === 404) {
                throw new ModelNotFoundException("The requested Resource does not exist.");
            }
            throw $e;
        }
    }
}
