<?php

declare(strict_types=1);

namespace Sap\Material;

class Dto
{
    public function __construct(
        public readonly string $sku,
        public readonly string $name,
    ) {
    }
}
