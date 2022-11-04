<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\AbstractFactory\Interfaces\Delivery;

interface AbstractDelivery
{
    public function createDelivery(): string;

    public function calculateDeliveryPrice(): float;
}