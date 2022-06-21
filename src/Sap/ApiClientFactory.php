<?php

declare(strict_types=1);

namespace Sap;

use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;

class ApiClientFactory
{
    public function __invoke(ContainerInterface $container): Client
    {
        return new Client(
            $container->get('config')['sap']['client']['options']
        );
    }
}
