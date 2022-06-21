<?php

declare(strict_types=1);

namespace CommerceLayer\Client;

/**
 * The implementation of the token provider is outside the scope of this
 * example project. The token provider is responsible for providing the token
 * for the request.
 */
class TokenProvider
{
    public function getToken(): string
    {
        return 'out-of-project-scope';
    }
}
