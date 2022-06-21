<?php

declare(strict_types=1);

namespace CommerceLayer;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'invokables' => [],
            'factories'  => [
                Authentication\Hmac\Middleware::class        => Authentication\Hmac\MiddlewareFactory::class,
                Authentication\Hmac\Validator::class         => Authentication\Hmac\ValidatorFactory::class,
                Authentication\Hmac\SharedSecretStore::class => Authentication\Hmac\SharedSecretStoreFactory::class,
                Sku\Repository::class                        => Sku\RepositoryFactory::class,
                ApiClientInterface::class                    => ApiClientFactory::class,
                Client::class                                => ClientFactory::class,
            ],
        ];
    }
}
