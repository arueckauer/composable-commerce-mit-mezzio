<?php

declare(strict_types=1);

use Mezzio\Application;
use Mezzio\MiddlewareFactory;
use Psr\Container\ContainerInterface;

return static function (
    Application $app,
    MiddlewareFactory $factory,
    ContainerInterface $container
): void {
    $app->get(
        '/api/event/material-change/{sku-code}',
        Api\Event\MaterialChange\RequestHandler::class,
        'api.event.material-change'
    );

    $app->get(
        '/api/ping',
        Api\Ping\RequestHandler::class,
        'api.ping'
    );
};
