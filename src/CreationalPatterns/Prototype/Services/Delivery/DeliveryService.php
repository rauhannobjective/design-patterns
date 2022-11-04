<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Prototype\Services\Delivery;

use DesignPatterns\Src\CreationalPatterns\Prototype\Enums\Delivery\LogisticTypeEnum;

class DeliveryService
{
    public function cloneDelivery(
        string $logisticType,
        float $distance,
        float $weight
    ): array {
        $logisticService = LogisticTypeEnum::getLogisticService($logisticType);
        $prototype = new $logisticService('Created', $distance, $weight);
        $clone = clone $prototype;

        return [
            'title' => $clone->title,
            'distance' => $clone->distance,
            'weight' => $clone->weight,
        ];
    }
}