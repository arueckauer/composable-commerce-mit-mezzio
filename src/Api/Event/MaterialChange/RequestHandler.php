<?php

declare(strict_types=1);

namespace Api\Event\MaterialChange;

use ApiConnector\Material\DataToCommerce\Transferrer;
use Laminas\Diactoros\Response\EmptyResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Throwable;

use function is_string;

class RequestHandler implements RequestHandlerInterface
{
    public function __construct(
        private readonly Transferrer $transferrer
    ) {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $skuCode = $request->getAttribute('sku-code');

        if (
            ! is_string($skuCode)
            || $skuCode === ''
        ) {
            return new EmptyResponse(400);
        }

        try {
            ($this->transferrer)($skuCode);
        } catch (Throwable) {
            return new EmptyResponse(500);
        }

        return new EmptyResponse();
    }
}
