<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\SimpleFactory\Services;

use DesignPatterns\Src\CreationalPatterns\SimpleFactory\Interfaces\Delivery\Delivery;

class MaritimeDelivery implements Delivery
{
    public function getTax(): float
    {
        return 22.22;
    }
}