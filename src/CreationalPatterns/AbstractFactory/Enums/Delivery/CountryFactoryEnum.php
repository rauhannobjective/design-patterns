<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\AbstractFactory\Enums\Delivery;

use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Factories\Delivery\BrazilDeliveryFactory;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Factories\Delivery\GermanyDeliveryFactory;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Factories\Delivery\JapanDeliveryFactory;

enum CountryFactoryEnum: string
{
    case BRAZIL = 'Brazil';
    case GERMANY = 'Germany';
    case JAPAN = 'Japan';

    public static function getCountryClass(string $country): string
    {
        $allClasses = [
            self::BRAZIL->value => BrazilDeliveryFactory::class,
            self::GERMANY->value => GermanyDeliveryFactory::class,
            self::JAPAN->value => JapanDeliveryFactory::class,
        ];

        return $allClasses[$country];
    }
}
