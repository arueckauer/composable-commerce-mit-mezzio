<?php

declare(strict_types=1);

namespace Sap\Material;

use Psr\Container\ContainerInterface;
use Sap\ApiClientInterface;

class RepositoryFactory
{
    public function __invoke(ContainerInterface $container): Repository
    {
        return new Repository(
            $container->get(ApiClientInterface::class)
        );
    }
}
