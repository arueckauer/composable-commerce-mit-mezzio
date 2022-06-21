<?php

declare(strict_types=1);

namespace CommerceLayer\Authentication\Hmac\Exception;

use InvalidArgumentException;

use function sprintf;

class SharedSecretNotFoundException extends InvalidArgumentException
{
    public static function fromRoute(string $route): self
    {
        return new self(sprintf(
            'No shared secret found for route "%s".',
            $route
        ));
    }
}
