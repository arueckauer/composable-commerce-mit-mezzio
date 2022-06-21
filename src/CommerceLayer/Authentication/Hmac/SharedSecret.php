<?php

declare(strict_types=1);

namespace CommerceLayer\Authentication\Hmac;

class SharedSecret
{
    public function __construct(
        public readonly string $route,
        public readonly string $secret,
    ) {
    }
}
