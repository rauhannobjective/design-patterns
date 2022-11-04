<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Builder\Enums\Delivery;

use DesignPatterns\Src\CreationalPatterns\Builder\Builders\Delivery\AirDeliveryBuilder;
use DesignPatterns\Src\CreationalPatterns\Builder\Builders\Delivery\MaritimeDeliveryBuilder;
use DesignPatterns\Src\CreationalPatterns\Builder\Builders\Delivery\RoadDeliveryBuilder;

enum LogisticTypeEnum: string
{
    case ROAD = 'Road';
    case MARITIME = 'Maritime';
    case AIR = 'Air';

    public static function getLogisticBuilder(string $logisticType): string
    {
        $allClasses = [
            self::ROAD->value => RoadDeliveryBuilder::class,
            self::MARITIME->value => MaritimeDeliveryBuilder::class,
            self::AIR->value => AirDeliveryBuilder::class,
        ];

        return $allClasses[$logisticType];
    }
}
