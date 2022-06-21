<?php

declare(strict_types=1);

namespace Api\Event\MaterialChange;

use ApiConnector\Material\DataToCommerce\Transferrer;
use Psr\Container\ContainerInterface;

class RequestHandlerFactory
{
    public function __invoke(ContainerInterface $container): RequestHandler
    {
        return new RequestHandler(
            $container->get(Transferrer::class)
        );
    }
}
