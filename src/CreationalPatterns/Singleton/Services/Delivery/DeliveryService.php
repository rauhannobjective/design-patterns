<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Singleton\Services\Delivery;

use DesignPatterns\Src\CreationalPatterns\Singleton\Enums\Delivery\LogisticTypeEnum;

class DeliveryService
{
    public function createDelivery(
        string $logisticType,
        float $distance,
        float $weight
    ): array {
        $logisticService = LogisticTypeEnum::getLogisticService($logisticType);

        $service1 = $logisticService::getInstance();
        $service1->setValue('distance', $distance);
        $service1->setValue('weight', $weight);

        $service2 = $logisticService::getInstance();

        return [
            'distance_service_1' => $service1->getValue('distance'),
            'distance_service_2' => $service2->getValue('distance'),
            'weight_service_1' => $service1->getValue('weight'),
            'weight_service_2' => $service2->getValue('weight'),
        ];
    }
}