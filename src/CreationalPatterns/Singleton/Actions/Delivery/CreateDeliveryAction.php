<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Singleton\Actions\Delivery;

use DesignPatterns\Src\Action;
use DesignPatterns\Src\CreationalPatterns\Singleton\Services\Delivery\DeliveryService;
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

        $result = $this->deliveryService->createDelivery(
            $params['logistic_type'],
            $params['distance'],
            $params['weight']
        );

        return $this->toJson($response, $result);
    }
}