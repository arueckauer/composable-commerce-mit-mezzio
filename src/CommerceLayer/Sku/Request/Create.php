<?php

declare(strict_types=1);

namespace CommerceLayer\Sku\Request;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

use function json_encode;

use const JSON_THROW_ON_ERROR;

class Create
{
    public static function create(
        array $attributes,
        array $relationships
    ): RequestInterface {
        $data = [
            'data' => [
                'type'          => 'skus',
                'attributes'    => $attributes,
                'relationships' => $relationships,
            ],
        ];

        return new Request(
            'POST',
            '/api/skus',
            [],
            json_encode($data, JSON_THROW_ON_ERROR)
        );
    }
}
