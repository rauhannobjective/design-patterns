<?php

namespace DesignPatterns\Src\CreationalPatterns\SimpleFactory\Interfaces\Delivery;

interface Delivery
{
    public function getTax(): float;
}