<?php

declare(strict_types=1);

namespace CommerceLayer\Authentication\Hmac;

use Psr\Container\ContainerInterface;

class MiddlewareFactory
{
    public function __invoke(ContainerInterface $container): Middleware
    {
        return new Middleware(
            $container->get(SharedSecretStore::class),
            $container->get(Validator::class),
        );
    }
}
