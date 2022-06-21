<?php

declare(strict_types=1);

namespace Api;

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
            'invokables' => [
                Event\MaterialChange\RequestHandler::class => Event\MaterialChange\RequestHandler::class,
                Ping\RequestHandler::class                 => Ping\RequestHandler::class,
            ],
            'factories'  => [],
        ];
    }
}
