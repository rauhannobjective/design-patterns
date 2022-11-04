<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\FactoryMethod\Creators\Delivery;

use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Interfaces\Delivery\Logistic;

abstract class CreateDeliveryCreator
{
    abstract public function factoryDeliveryCreation(): Logistic;

    public function createDelivery(): array
    {
        $logistic = $this->factoryDeliveryCreation();

        $result['price'] = $logistic->calculateDeliveryPriceInBRL();
        $result['status'] = $logistic->createDelivery();

        return $result;
    }
}