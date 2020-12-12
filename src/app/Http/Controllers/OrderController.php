<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Services\Interfaces\OrderServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected OrderServiceInterface $orderService;

    public function __construct(OrderServiceInterface $interface)
    {
        $this->orderService = $interface;
    }

    public function create(CreateOrderRequest $request, int $id)
    {

    }
}
