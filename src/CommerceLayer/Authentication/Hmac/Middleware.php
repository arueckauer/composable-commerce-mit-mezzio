<?php

declare(strict_types=1);

namespace CommerceLayer\Authentication\Hmac;

use Laminas\Diactoros\Response\EmptyResponse;
use Mezzio\Router\RouteResult;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function assert;
use function count;

class Middleware implements MiddlewareInterface
{
    public function __construct(
        private readonly SharedSecretStore $secretStore,
        private readonly Validator $hmacValidator,
    ) {
    }

    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        $route = $request->getAttribute(RouteResult::class);
        assert($route instanceof RouteResult);
        $routeName = $route->getMatchedRouteName();

        if (false === $routeName) {
            return new EmptyResponse(401);
        }

        if (! $this->secretStore->has($routeName)) {
            return new EmptyResponse(401);
        }

        $signature          = $request->getHeader('x-commercelayer-signature');
        $numberOfSignatures = count($signature);

        if (1 !== $numberOfSignatures) {
            return new EmptyResponse(401);
        }

        $payload = (string) $request->getBody();

        if (
            $this->hmacValidator->invoke(
                $this->secretStore->get($routeName)->secret,
                $signature[0],
                $payload
            )
        ) {
            return $handler->handle($request);
        }

        return new EmptyResponse(401);
    }
}
