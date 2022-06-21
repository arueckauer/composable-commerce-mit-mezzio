<?php

declare(strict_types=1);

namespace ApiTest\Ping;

use Api\Ping\RequestHandler;
use Laminas\Diactoros\Response\JsonResponse;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

use function json_decode;

class RequestHandlerTest extends TestCase
{
    public function testResponse(): void
    {
        $pingHandler = new RequestHandler();
        $response    = $pingHandler->handle(
            $this->createMock(ServerRequestInterface::class)
        );

        $json = json_decode((string) $response->getBody());

        self::assertInstanceOf(JsonResponse::class, $response);
        self::assertTrue(isset($json->ack));
    }
}
