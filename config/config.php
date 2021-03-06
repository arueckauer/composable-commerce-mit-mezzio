<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;

$aggregator = new ConfigAggregator([
    // Laminas
    Laminas\Diactoros\ConfigProvider::class,
    Laminas\HttpHandlerRunner\ConfigProvider::class,

    // Mezzio
    Mezzio\Tooling\ConfigProvider::class,
    Mezzio\Helper\ConfigProvider::class,
    Mezzio\Router\FastRouteRouter\ConfigProvider::class,
    Mezzio\ConfigProvider::class,
    Mezzio\Router\ConfigProvider::class,

    // App
    Api\ConfigProvider::class,
    ApiConnector\ConfigProvider::class,
    CommerceLayer\ConfigProvider::class,
    Sap\ConfigProvider::class,

    // Load application config in a pre-defined order in such a way that local settings
    // overwrite global settings. (Loaded as first to last):
    //   - `global.php`
    //   - `*.global.php`
    //   - `local.php`
    //   - `*.local.php`
    new PhpFileProvider(realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php'),

    // Load development config if it exists
    new PhpFileProvider(realpath(__DIR__) . '/development.config.php'),
]);

return $aggregator->getMergedConfig();
