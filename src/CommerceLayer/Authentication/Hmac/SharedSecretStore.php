<?php

declare(strict_types=1);

namespace CommerceLayer\Authentication\Hmac;

use CommerceLayer\Authentication\Hmac\Exception\SharedSecretNotFoundException;

class SharedSecretStore
{
    /** @var SharedSecret[] */
    private array $sharedSecrets;

    public function __construct(array $sharedSecrets)
    {
        $this->sharedSecrets = $sharedSecrets;
    }

    public function has(string $route): bool
    {
        foreach ($this->sharedSecrets as $sharedSecret) {
            if ($route === $sharedSecret->route) {
                return true;
            }
        }

        return false;
    }

    public function get(string $route): SharedSecret
    {
        foreach ($this->sharedSecrets as $sharedSecret) {
            if ($route === $sharedSecret->route) {
                return $sharedSecret;
            }
        }

        throw SharedSecretNotFoundException::fromRoute($route);
    }
}
