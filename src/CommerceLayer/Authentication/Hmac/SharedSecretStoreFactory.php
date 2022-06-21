<?php

declare(strict_types=1);

namespace CommerceLayer\Authentication\Hmac;

use Psr\Container\ContainerInterface;

class SharedSecretStoreFactory
{
    public function __invoke(ContainerInterface $container): SharedSecretStore
    {
        $sharedSecrets           = [];
        $configuredSharedSecrets = $container->get('config')['commerce_layer']['webhooks']['shared_secrets'] ?? [];
        foreach ($configuredSharedSecrets as $route => $secret) {
            $sharedSecrets[] = new SharedSecret($route, $secret);
        }

        return new SharedSecretStore($sharedSecrets);
    }
}
