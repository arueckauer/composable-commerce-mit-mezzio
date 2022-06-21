<?php

declare(strict_types=1);

namespace CommerceLayer\Sku;

use CommerceLayer\Client;
use CommerceLayer\Sku\Request\Create;
use CommerceLayer\Sku\Request\ReadOneByCode;

class Repository
{
    public function __construct(
        private Client $client,
    ) {
    }

    public function readOneByCode(string $code): Dto
    {
        $request  = ReadOneByCode::create($code);
        $response = $this->client->sendRequest($request);

        return Dto::fromResponse($response);
    }

    public function create(array $attributes, array $relationships): Dto
    {
        $request  = Create::create($attributes, $relationships);
        $response = $this->client->sendRequest($request);

        return Dto::fromResponse($response);
    }
}
