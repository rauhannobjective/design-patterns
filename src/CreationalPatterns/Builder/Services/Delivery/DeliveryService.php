<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Builder\Services\Delivery;

use DesignPatterns\Src\CreationalPatterns\Builder\Enums\Delivery\LogisticTypeEnum;

class DeliveryService
{
    public function createDelivery(
        string $logisticType,
        float $distance,
        float $weight
    ): array {
        $logisticBuilder = LogisticTypeEnum::getLogisticBuilder($logisticType);
        $builder = new $logisticBuilder();
        $builder->reset();

        $builder->produceDeliveryDistance($distance);
        $builder->produceDeliveryWeight($weight);
        $builder->produceDeliveryPrice($distance, $weight);

        return [
            'price' => $builder->delivery->price,
            'status' => $logisticType . ' delivery created.'
        ];
    }
}