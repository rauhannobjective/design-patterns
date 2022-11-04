<?php

declare(strict_types=1);

namespace DesignPatterns\Src\CreationalPatterns\Prototype\Actions\Delivery;

use DesignPatterns\Src\Action;
use DesignPatterns\Src\CreationalPatterns\Prototype\Services\Delivery\DeliveryService;
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

        $result = $this->deliveryService->cloneDelivery(
            $params['logistic_type'],
            $params['distance'],
            $params['weight']
        );

        return $this->toJson($response, $result);
    }
}