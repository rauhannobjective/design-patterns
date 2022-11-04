<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\FactoryMethod\Services\Delivery;

use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Creators\Delivery\CreateDeliveryCreator;

class DeliveryService
{
    public function createDelivery(CreateDeliveryCreator $createDeliveryCreator): array
    {
        return $createDeliveryCreator->createDelivery();
    }
}