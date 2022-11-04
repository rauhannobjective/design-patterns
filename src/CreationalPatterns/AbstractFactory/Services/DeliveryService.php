<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services;

use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Enums\Delivery\LogisticTypeEnum;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Interfaces\Delivery\AbstractDelivery;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Interfaces\Delivery\AbstractFactory;
use Exception;

class DeliveryService
{
    /**
     * @throws Exception
     */
    public function createDelivery(AbstractFactory $abstractFactory): array
    {
        $countryLogisticService = $this->getCountryLogisticService($abstractFactory);

        $result['price'] = $countryLogisticService->calculateDeliveryPrice();
        $result['status'] = $countryLogisticService->createDelivery();

        return $result;
    }

    /**
     * @throws Exception
     */
    private function getCountryLogisticService(AbstractFactory $abstractFactory): AbstractDelivery
    {
        return match ($abstractFactory->getLogisticTypeEnum()) {
            LogisticTypeEnum::ROAD->value => $abstractFactory->createRoadDelivery(),
            LogisticTypeEnum::MARITIME->value => $abstractFactory->createMaritimeDelivery(),
            LogisticTypeEnum::AIR->value => $abstractFactory->createAirDelivery(),
            'default' => throw new Exception('Country logistic not found.')
        };
    }
}