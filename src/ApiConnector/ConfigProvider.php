<?php

declare(strict_types=1);

namespace ApiConnector;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'invokables' => [],
            'factories'  => [
                Material\DataToCommerce\Transferrer::class => Material\DataToCommerce\TransferrerFactory::class,
            ],
        ];
    }
}
