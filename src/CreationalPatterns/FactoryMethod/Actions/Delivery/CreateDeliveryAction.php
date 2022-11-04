<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\FactoryMethod\Actions\Delivery;

use DesignPatterns\Src\Action;
use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Enums\Delivery\LogisticTypeEnum;
use DesignPatterns\Src\CreationalPatterns\FactoryMethod\Services\Delivery\DeliveryService;
use Slim\Psr7\Message;
use Slim\Psr7\Response;

class CreateDeliveryAction extends Action
{
    public function __construct(private readonly DeliveryService $deliveryService)
    {}

    public function __invoke($request, $response, $args): Response|Message
    {
        $params = $request->getParsedBody();
        $deliveryClass = LogisticTypeEnum::getDeliveryClass($params['logistic_type']);

        $result = $this->deliveryService->createDelivery(new $deliveryClass(
            $params['distance'],
            $params['weight']
        ));

        return $this->toJson($response, $result);
    }
}