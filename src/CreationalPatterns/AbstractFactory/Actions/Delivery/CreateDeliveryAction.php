<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\AbstractFactory\Actions\Delivery;

use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Enums\Delivery\CountryFactoryEnum;
use DesignPatterns\Src\CreationalPatterns\AbstractFactory\Services\DeliveryService;
use DesignPatterns\Src\Action;
use Exception;
use Slim\Psr7\Message;
use Slim\Psr7\Response;

class CreateDeliveryAction extends Action
{
    public function __construct(private readonly DeliveryService $deliveryService)
    {}

    /**
     * @throws Exception
     */
    public function __invoke($request, $response, $args): Response|Message
    {
        $params = $request->getParsedBody();
        $countryFactoryClass = CountryFactoryEnum::getCountryClass($params['country']);

        $result = $this->deliveryService->createDelivery(new $countryFactoryClass(
            $params['logistic_type'],
            $params['distance'],
            $params['weight']
        ));

        return $this->toJson($response, $result);
    }
}