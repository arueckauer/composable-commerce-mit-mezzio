<?php

declare(strict_types=1);

namespace Sap;

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
            'factories'  => [],
        ];
    }
}
