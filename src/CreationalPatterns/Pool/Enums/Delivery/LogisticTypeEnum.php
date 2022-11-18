<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Pool\Enums\Delivery;

enum LogisticTypeEnum: string
{
    case ROAD = 'Road';
    case MARITIME = 'Maritime';
    case AIR = 'Air';
}
