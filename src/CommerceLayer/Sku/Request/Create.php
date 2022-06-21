<?php

declare(strict_types=1);

namespace CommerceLayer\Sku\Request;

use CommerceLayer\Sku\Dto;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

use function json_encode;

use const JSON_THROW_ON_ERROR;

class Create
{
    public static function create(Dto $dto): RequestInterface
    {
        $data = [
            'data' => [
                'type'       => 'skus',
                'attributes' => [
                    'code' => $dto->code,
                    'name' => $dto->name,
                ],
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
