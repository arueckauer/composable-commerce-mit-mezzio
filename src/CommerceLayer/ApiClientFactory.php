<?php

declare(strict_types=1);

namespace CommerceLayer;

use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;

class ApiClientFactory
{
    public function __invoke(ContainerInterface $container): Client
    {
        return new Client(
            $container->get('config')['commerce_layer']['client']['options']
        );
    }
}
