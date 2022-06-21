<?php

declare(strict_types=1);

namespace CommerceLayer;

use CommerceLayer\Client\TokenProvider;
use Psr\Container\ContainerInterface;

class ClientFactory
{
    public function __invoke(ContainerInterface $container): Client
    {
        return new Client(
            $container->get(ApiClientInterface::class),
            new TokenProvider()
        );
    }
}
