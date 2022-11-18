<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\SimpleFactory\Services;

use DesignPatterns\Src\CreationalPatterns\SimpleFactory\Interfaces\Delivery\Delivery;

class RoadDelivery implements Delivery
{
    public function getTax(): float
    {
        return 11.11;
    }
}