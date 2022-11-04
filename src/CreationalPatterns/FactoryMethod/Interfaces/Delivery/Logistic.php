<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\FactoryMethod\Interfaces\Delivery;

interface Logistic
{
    public function createDelivery(): string;

    public function calculateDeliveryPriceInBRL(): float;
}