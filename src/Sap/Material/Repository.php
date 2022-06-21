<?php

declare(strict_types=1);

namespace Sap\Material;

use Sap\ApiClientInterface;
use Sap\Material\Request\ReadOneBySku;

class Repository
{
    public function __construct(
        private readonly ApiClientInterface $client
    ) {
    }

    public function readOneBySku(string $sku): Dto
    {
        $request  = ReadOneBySku::create($sku);
        $response = $this->client->sendRequest($request);

        return Dto::fromResponse($response);
    }
}
