<?php

declare(strict_types=1);

namespace CommerceLayer\Authentication\Hmac;

use Psr\Container\ContainerInterface;

class ValidatorFactory
{
    public function __invoke(ContainerInterface $container): Validator
    {
        return new Validator();
    }
}
