<?php


namespace App\Services\Auth;


use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Request;

class JwtHydraAuth implements Guard
{
    protected Request $request;
    protected UserProvider $provider;
    protected User $user;

    public function __construct(UserProvider $provider, Request $request)
    {
        $this->request = $request;
        $this->provider = $provider;
    }

    public function check()
    {
        return ($this->user !== NULL);
    }

    public function guest()
    {
        return !$this->check();
    }

    public function user()
    {
        if ($this->user !== NULL) {
            return $this->user;
        }
    }

    public function id()
    {
        if ($user = $this->user()) {
            return $this->user()->getAuthIdentifier();
        }
    }

    public function validate(array $credentials = [])
    {
        if (empty($credentials['username']) || empty($credentials['password'])) {
            if (!$credentials=$this->getJsonParams()) {
                return false;
            }
        }

        $user = $this->provider->retrieveByCredentials($credentials);

        if (! is_null($user) && $this->provider->validateCredentials($user, $credentials)) {
            $this->setUser($user);

            return true;
        } else {
            return false;
        }
    }

    public function setUser(Authenticatable $user)
    {
        $this->user = $user;
        return $this;
    }
}