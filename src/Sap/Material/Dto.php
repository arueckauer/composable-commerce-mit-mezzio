<?php

declare(strict_types=1);

namespace Sap\Material;

use Psr\Http\Message\ResponseInterface;

use function json_decode;

use const JSON_THROW_ON_ERROR;

class Dto
{
    public function __construct(
        public readonly string $sku,
        public readonly string $name,
    ) {
    }

    public static function fromResponse(ResponseInterface $response): Dto
    {
        $data = json_decode(
            $response->getBody()->getContents(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        return new self(
            $data['sku'],
            $data['name'],
        );
    }
}
