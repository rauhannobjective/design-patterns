<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Singleton\Enums\Delivery;

use DesignPatterns\Src\CreationalPatterns\Singleton\Services\Delivery\AirDeliveryService;
use DesignPatterns\Src\CreationalPatterns\Singleton\Services\Delivery\MaritimeDeliveryService;
use DesignPatterns\Src\CreationalPatterns\Singleton\Services\Delivery\RoadDeliveryService;

enum LogisticTypeEnum: string
{
    case ROAD = 'Road';
    case MARITIME = 'Maritime';
    case AIR = 'Air';

    public static function getLogisticService(string $logisticType): string
    {
        $allClasses = [
            self::ROAD->value => RoadDeliveryService::class,
            self::MARITIME->value => MaritimeDeliveryService::class,
            self::AIR->value => AirDeliveryService::class,
        ];

        return $allClasses[$logisticType];
    }
}
