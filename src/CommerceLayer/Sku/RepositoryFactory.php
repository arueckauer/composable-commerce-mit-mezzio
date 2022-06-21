<?php

declare(strict_types=1);

namespace CommerceLayer\Sku;

use CommerceLayer\Client;
use Psr\Container\ContainerInterface;

class RepositoryFactory
{
    public function __invoke(ContainerInterface $container): Repository
    {
        return new Repository(
            $container->get(Client::class),
        );
    }
}
