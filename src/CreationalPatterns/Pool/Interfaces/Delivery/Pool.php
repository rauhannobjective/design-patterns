<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Pool\Interfaces\Delivery;

interface Pool
{
    public function getTax(): float;
}