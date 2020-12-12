<?php

namespace App\Http\Services\Interfaces;

use App\Http\Repositories\Interfaces\OrderRepositoryInterface;
use App\Http\Requests\CreateOrderRequest;

interface OrderServiceInterface
{
    public function getRepository(): OrderRepositoryInterface;

    public function create(CreateOrderRequest $request, int $itemId);
}
