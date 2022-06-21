<?php

declare(strict_types=1);

namespace ApiConnector\Material\DataToCommerce;

use CommerceLayer\Sku\Repository as SkuRepository;
use Psr\Container\ContainerInterface;
use Sap\Material\Repository as MaterialRepository;

class TransferrerFactory
{
    public function __invoke(ContainerInterface $container): Transferrer
    {
        return new Transferrer(
            $container->get(MaterialRepository::class),
            $container->get(SkuRepository::class),
        );
    }
}
