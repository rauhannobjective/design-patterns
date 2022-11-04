<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\FactoryMethod\Enums\Delivery;

use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Creators\Delivery\CreateAirDeliveryCreator;
use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Creators\Delivery\CreateMaritimeDeliveryCreator;
use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Creators\Delivery\CreateRoadDeliveryCreator;

enum LogisticTypeEnum: string
{
    case ROAD = 'Road';
    case MARITIME = 'Maritime';
    case AIR = 'Air';

    public static function getDeliveryClass(string $logisticClass): string
    {
        $allClasses = [
            self::ROAD->value => CreateRoadDeliveryCreator::class,
            self::MARITIME->value => CreateMaritimeDeliveryCreator::class,
            self::AIR->value => CreateAirDeliveryCreator::class,
        ];

        return $allClasses[$logisticClass];
    }
}
