<?php

namespace App\Http\Services;

use App\Http\Repositories\Interfaces\OrderRepositoryInterface;
use App\Http\Requests\CreateOrderRequest;

class OrderService implements Interfaces\OrderServiceInterface
{

    protected OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $repository)
    {
        $this->orderRepository = $repository;
    }

    public function getRepository(): OrderRepositoryInterface
    {
        return $this->orderRepository;
    }

    public function create(CreateOrderRequest $request, int $itemId)
    {
        // TODO: Implement create() method.
    }
}
