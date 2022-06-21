<?php

declare(strict_types=1);

namespace CommerceLayer\Sku\Request;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class ReadOneByCode
{
    public static function create(string $code): RequestInterface
    {
        return new Request(
            'GET',
            '/api/skus?filter[q][code_eq]=' . $code
        );
    }
}
