<?php

declare(strict_types=1);

namespace CommerceLayer\Sku;

use CommerceLayer\Client;
use CommerceLayer\Sku\Request\Create;
use CommerceLayer\Sku\Request\ReadOneByCode;
use CommerceLayer\Sku\Request\Update;

class Repository
{
    public function __construct(
        private readonly Client $client,
    ) {
    }

    public function readOneByCode(string $code): Dto
    {
        $request  = ReadOneByCode::create($code);
        $response = $this->client->sendRequest($request);

        return Dto::fromResponse($response);
    }

    public function create(Dto $dto): Dto
    {
        $request  = Create::create($dto);
        $response = $this->client->sendRequest($request);

        return Dto::fromResponse($response);
    }

    public function update(Dto $sku): Dto
    {
        $request  = Update::create($sku);
        $response = $this->client->sendRequest($request);

        return Dto::fromResponse($response);
    }
}
