<?php

declare(strict_types=1);

namespace CommerceLayer\Sku;

use Psr\Http\Message\ResponseInterface;
use Sap\Material\Dto as MaterialDto;

use function json_decode;

use const JSON_THROW_ON_ERROR;

class Dto
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $code,
        public readonly string $name,
    ) {
    }

    public static function fromResponse(ResponseInterface $response): self
    {
        $data = json_decode(
            $response->getBody()->getContents(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        return new self(
            $data['data']['id'],
            $data['data']['attributes']['code'],
            $data['data']['attributes']['name'],
        );
    }

    public static function fromMaterialDto(MaterialDto $material): self
    {
        return new self(
            null,
            $material->sku,
            $material->name,
        );
    }
}
