<?php

declare(strict_types=1);

namespace Sap\Material\Request;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class ReadOneBySku
{
    public static function create(string $sku): RequestInterface
    {
        return new Request(
            'GET',
            '/api/material/' . $sku
        );
    }
}
