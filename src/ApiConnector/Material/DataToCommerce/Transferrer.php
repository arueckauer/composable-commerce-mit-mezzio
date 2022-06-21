<?php

declare(strict_types=1);

namespace ApiConnector\Material\DataToCommerce;

use CommerceLayer\Sku\Dto;
use CommerceLayer\Sku\Repository as SkuRepository;
use GuzzleHttp\Exception\ClientException;
use Sap\Material\Repository as MaterialRepository;

class Transferrer
{
    public function __construct(
        private readonly MaterialRepository $materialRepository,
        private readonly SkuRepository $skuRepository,
    ) {
    }

    public function __invoke(string $skuCode): void
    {
        $material = $this->materialRepository->readOneBySku($skuCode);

        try {
            $sku = $this->skuRepository->readOneByCode($material->sku);

            $updatedSku = new Dto(
                $sku->id,
                $material->sku,
                $material->name,
            );

            $this->skuRepository->update($updatedSku);
        } catch (ClientException) {
            $this->skuRepository->create(Dto::fromMaterialDto($material));
        }
    }
}
