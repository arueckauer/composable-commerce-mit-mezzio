<?php

declare(strict_types=1);

namespace CommerceLayer;

use CommerceLayer\Client\TokenProvider;
use Psr\Http\Client\ClientInterface as HttpClient;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Client
{
    public function __construct(
        private readonly HttpClient $httpClient,
        private readonly TokenProvider $tokenProvider
    ) {
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        return $this->httpClient->sendRequest(
            $this->withToken($request)
        );
    }

    private function withToken(RequestInterface $request): RequestInterface
    {
        return $request->withHeader('Authorization', $this->tokenProvider->getToken());
    }
}
